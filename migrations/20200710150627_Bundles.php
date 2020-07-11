<?php

use Sokil\Mongo\Migrator\AbstractMigration;

class Bundles extends AbstractMigration
{
    public function up()
    {
        $collection = $this
            ->getDatabase('local')
            ->getCollection('Bundle');

        $collection->batchInsert([
		   ["5" => [
			    "products" => [
				    "TJYHG-I08NN",
				    "MPFD8-DK8N3",
				    "GGWD4-RFXN4",
				    "RBNWT-SVRRO",
				    "APBZP-UB7U5"
			    ],
		        "discount" => 29
		   ]],
		   ["3" => [
			    "products" => [
				    "8BGRJ-FYMVI",
				    "RBNWT-SVRRO"
			    ],
		        "discount" => 20
		   ]],
		   ["4" => [
			    "products" => [
				    "Q7GA6-XL6JR",
				    "C3DR3-DGEUE"
			    ],
		        "discount" => 20
		   ]],
		   ["0" => [
			    "products" => [
				    "4RU1U-P3BAM",
				    "64GMS-DYTPL",
				    "PTOCU-S4ERI",
				    "QWEEV-YAHNS",
				    "C8IYN-8KGWS"
			    ],
		        "discount" => 35
		   ]],
		   ["1" => [
			    "products" => [
				    "ZCSEX-RUYVY",
				    "0MF6N-FRMFY",
				    "UCYKA-SSOPO",
				    "DRFWT-RX1HF",
				    "VGXEX-POYNX"
			    ],
		        "discount" => 23
		   ]],
		   ["2" => [
			    "products" => [
				    "GSCPO-GCB0Q"
			    ],
		        "discount" => 23
		   ]]
		]);
    }
    
    public function down()
    {
        $collection = $this
            ->getDatabase('local')
            ->getCollection('Bundle');

        $collection->delete();
    }
}
