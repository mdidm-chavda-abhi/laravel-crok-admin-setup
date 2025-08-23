<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\CategoryStep;
use App\Models\RequiredDoc;
use App\Models\StepOption;

class CategoryStepSeeder extends Seeder
{
    public function run(): void
    {
        // Helper function for adding options dynamically
        $addOptions = function ($step, $options) {
            foreach ($options as $option) {
                StepOption::create([
                    'step_id' => $step->id,
                    'option_name' => $option,
                ]);
            }
        };

        /** =========================
         *  NEC
         *  ========================= */
        $nec = Category::where('name', 'NEC')->first();
        $necDocs = ['Latest mortgage deed'];

        foreach ($necDocs as $doc) {
            RequiredDoc::create(['category_id' => $nec->id, 'doc_name' => $doc]);
        }

        $necSteps = [
            ['name' => 'Section 64-67 memo noting', 'type' => 'simple'],
            ['name' => 'Apply for search/encumbrance certificate', 'type' => 'simple'],
            ['name' => 'NEC drafting', 'type' => 'simple'],
            ['name' => 'Bill drafting', 'type' => 'simple'],
            ['name' => 'NEC ready to print', 'type' => 'simple'],
            ['name' => 'NEC ready for sign', 'type' => 'simple'],
            ['name' => 'NEC is scanned', 'type' => 'copy_option'],
            ['name' => 'NEC ready to deliver', 'type' => 'simple'],
            ['name' => 'Delivered', 'type' => 'simple'],
            ['name' => 'Bill Received or Bill Pending', 'type' => 'received_pending'],
        ];

        foreach ($necSteps as $s) {
            $step = CategoryStep::create([
                'category_id' => $nec->id,
                'step_name' => $s['name'],
                'step_type' => $s['type'],
            ]);

            if ($s['type'] === 'received_pending') {
                $addOptions($step, ['Bill Received', 'Bill Pending']);
            }
        }

        /** =========================
         *  LEGAL AUDIT
         *  ========================= */
        $la = Category::where('name', 'Legal Audit')->first();
        $laDocs = [
            'Allotment letter',
            'Latest sanction resolution',
            'Both advocate TCR name and date',
            'Last legal audit report if applicable',
            'Loan documents and property documents scrutiny'
        ];

        foreach ($laDocs as $doc) {
            RequiredDoc::create(['category_id' => $la->id, 'doc_name' => $doc]);
        }

        $laSteps = [
            ['name' => 'Apply for search/encumbrance certificate', 'type' => 'simple'],
            ['name' => 'LAR drafting', 'type' => 'simple'],
            ['name' => 'LAR Bill drafting', 'type' => 'simple'],
            ['name' => 'LAR ready to print', 'type' => 'simple'],
            ['name' => 'LAR ready for sign', 'type' => 'simple'],
            ['name' => 'LAR is scanned', 'type' => 'simple'],
            ['name' => 'LAR ready to deliver', 'type' => 'simple'],
            ['name' => 'Delivered', 'type' => 'simple'],
            ['name' => 'Bill Received or Bill Pending', 'type' => 'received_pending'],
        ];

        foreach ($laSteps as $s) {
            $step = CategoryStep::create([
                'category_id' => $la->id,
                'step_name' => $s['name'],
                'step_type' => $s['type'],
            ]);

            if ($s['type'] === 'received_pending') {
                $addOptions($step, ['Bill Received', 'Bill Pending']);
            }
        }

        /** =========================
         *  TCR
         *  ========================= */
        $tcr = Category::where('name', 'TCR')->first();
        RequiredDoc::create(['category_id' => $tcr->id, 'doc_name' => 'Property file']);

        $tcrSteps = [
            ['name' => 'Apply for search', 'type' => 'simple'],
            ['name' => 'Apply for certified copy', 'type' => 'received_pending'],
            ['name' => 'TCR drafting', 'type' => 'simple'],
            ['name' => 'TCR Bill drafting', 'type' => 'simple'],
            ['name' => 'TCR ready to print', 'type' => 'simple'],
            ['name' => 'TCR ready for sign', 'type' => 'simple'],
            ['name' => 'TCR is scanned', 'type' => 'simple'],
            ['name' => 'TCR ready to deliver', 'type' => 'simple'],
            ['name' => 'Delivered', 'type' => 'simple'],
            ['name' => 'Bill Received or Bill Pending', 'type' => 'received_pending'],
        ];

        foreach ($tcrSteps as $s) {
            $step = CategoryStep::create([
                'category_id' => $tcr->id,
                'step_name' => $s['name'],
                'step_type' => $s['type'],
            ]);

            if ($s['name'] === 'Apply for certified copy') {
                $addOptions($step, ['Available', 'Not Available']);
            } elseif ($s['type'] === 'received_pending') {
                $addOptions($step, ['Bill Received', 'Bill Pending']);
            }
        }

        /** =========================
         *  CERTIFIED COPY
         *  ========================= */
        $cc = Category::where('name', 'Certified Copy')->first();
        RequiredDoc::create(['category_id' => $cc->id, 'doc_name' => 'Deed PDF']);

        $ccSteps = [
            ['name' => 'Apply for certified copy', 'type' => 'simple'],
            ['name' => 'CF copy received', 'type' => 'simple'],
            ['name' => 'CF Bill drafting', 'type' => 'simple'],
            ['name' => 'CF copy ready to deliver', 'type' => 'simple'],
            ['name' => 'Delivered', 'type' => 'simple'],
            ['name' => 'Bill received or pending', 'type' => 'received_pending'],
        ];

        foreach ($ccSteps as $s) {
            $step = CategoryStep::create([
                'category_id' => $cc->id,
                'step_name' => $s['name'],
                'step_type' => $s['type'],
            ]);

            if ($s['type'] === 'received_pending') {
                $addOptions($step, ['Bill Received', 'Bill Pending']);
            }
        }

        /** =========================
         *  TRANSLATION MEMO
         *  ========================= */
        $tm = Category::where('name', 'Translation Memo')->first();
        RequiredDoc::create(['category_id' => $tm->id, 'doc_name' => 'Deed to be translated']);

        $tmSteps = [
            ['name' => 'Translation memo drafting', 'type' => 'simple'],
            ['name' => 'Translation memo Bill drafting', 'type' => 'simple'],
            ['name' => 'Translation memo ready to print', 'type' => 'simple'],
            ['name' => 'Translation memo ready for signature', 'type' => 'simple'],
            ['name' => 'Translation memo is scanned', 'type' => 'simple'],
            ['name' => 'Translation memo ready to deliver', 'type' => 'simple'],
            ['name' => 'Delivered', 'type' => 'simple'],
            ['name' => 'Bill received or pending', 'type' => 'received_pending'],
        ];

        foreach ($tmSteps as $s) {
            $step = CategoryStep::create([
                'category_id' => $tm->id,
                'step_name' => $s['name'],
                'step_type' => $s['type'],
            ]);

            if ($s['type'] === 'received_pending') {
                $addOptions($step, ['Bill Received', 'Bill Pending']);
            }
        }
    }
}
