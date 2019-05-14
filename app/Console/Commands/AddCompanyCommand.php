<?php

namespace App\Console\Commands;

use App\Company;
use Illuminate\Console\Command;

class AddCompanyCommand extends Command
{
    // เขียน command ที่เราจะใช้ลงในนี้ ในวงเล็บเราสามรถกำหนดให้มันใส่ชื่อหรือ agement ได้.
    protected $signature = 'contact:company';

    // เราสามารถ เพิ่มคำอธิบายได้.
    protected $description = 'Add a new company';

    // เราสามรถเขียนโค้ดด้านล่างเพื่อจัดการ command ของเราได้

    public function handle()
    {

        $name = $this->ask('What is the company name ?');
        $phone = $this->ask('What is the company\'s phone number ?');

        if ($this->confirm('Are you ready to insert "'. $name .'"?')) {

            $company = Company::create([
                'name' => $name,
                'phone' => $phone
            ]);

            return $this->info('Added: ' . $company->name);
        } else {
            $this->warn('No new company was added.');
        }


        // สามารถแสดงข้อความต่างๆ ได้;
        // $this->info('show info message');
        // $this->warn('show warning message');
        // $this->error('show error message');
    }
}
