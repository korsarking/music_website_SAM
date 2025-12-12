<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class CleanupAbandonedCarts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "carts:cleanup-abandoned";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Marks inactive active carts as abandoned and clears their items";

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $threshold = now()->subMinutes(value: 30);

        $carts = Cart::query()
            ->where("status", "active")
            ->where("updated_at", "<", $threshold)
            ->get();

        $count = 0;

        foreach ($carts as $cart) {
            DB::transaction(function () use ($cart) {
                $cart->update(["status" => "abandoned"]);
                $cart->items()->delete();
            });

            $count++;
        }

        $this->info("Cleaned {$count} abandoned carts.");
    }
}
