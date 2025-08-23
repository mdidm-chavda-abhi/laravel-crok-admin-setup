<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bank;

class BankSeeder extends Seeder
{
    public function run(): void
    {
        $banks = [
            'SBI SME Gondal road branch, Rajkot',
            'SBI SME Rajkot',
            'SBI COMMERCIAL BRANCH, RAJKOT',
            'SBI COMMERCIAL BRANCH, MORBI',
            'SBI SME BRANCH, Morbi',
            'SBI SSI BRANCH, MORBI',
            'SBI, Gondal Branch',
            'SBI SME LAW GARDEN BRANCH, Ahmedabad',
            'SBI SME BRANCH, BODELI, CHHOTA UDAIPUR',
        ];

        foreach ($banks as $bank) {
            Bank::create([
                'bank_name' => $bank,
                'bank_address' => null, // You can update addresses later
            ]);
        }
    }
}
