<?php

use Sokil\Mongo\Migrator\AbstractMigration;

class Products extends AbstractMigration
{
    public function up()
    {
        $collection = $this
            ->getDatabase('local')
            ->getCollection('Product');

        $collection->batchInsert([
		   [
		     "id" => "ffe089af-3ffc-4ac1-a7da-db4e09ad20b7",
		      "sku" => "DZ7SL-92XNB",
		      "price" => 49.47
		   ],
		   [
			  "id" => "294786ac-8306-4e85-adb4-3c328727660f",
		      "sku" => "KRG26-FMWPJ",
		      "price" => 79.34
		   ],
		   [
			  "id" => "748112ab-0e2c-4060-919a-8c4c069386fb",
		      "sku" => "WPNSN-HAXFO",
		      "price" => 16.48
		   ],
		   [
			  "id" => "b0c47f62-0c3e-4b2d-9f35-e54973e9191f",
		      "sku" => "BVNPR-J1PKL",
		      "price" => 46.32
		   ],
		   [
			  "id" => "2f7632e8-b1de-4fba-8d75-75e6deab44c3",
		      "sku" => "TM84E-KY5UX",
		      "price" => 23.32
		   ],
		   [
			  "id" => "af3753dc-aa66-49d8-ba25-e9f8c7f51433",
		      "sku" => "DLTC8-SZVTB",
		      "price" => 95.52
		   ],
		   [
			  "id" => "44f6d48c-9909-468d-b62d-956e422475fe",
		      "sku" => "CQYML-CRR9S",
		      "price" => 22.1
		   ],
		   [
			  "id" => "00a39021-cc67-4b93-b5d2-a4f2100abcfe",
		      "sku" => "TJYHG-I08NN",
		      "price" => 12.02
		   ],
		   [
			  "id" => "b786dbe2-07f3-4e1d-9ba3-c05d6b7059a9",
		      "sku" => "IZS2Q-FXFQP",
		      "price" => 82.21
		   ],
		   [
			  "id" => "86a6b0db-0aa3-4ce7-8cfd-c28bc7866a32",
		      "sku" => "0NB5O-WIW9L",
		      "price" => 22.36
		   ],
		   [
			  "id" => "b335923e-f006-4af6-8abe-233f88c19ed0",
		      "sku" => "QDN7C-5BJLU",
		      "price" => 78.46
		   ],
		   [
			  "id" => "7b31afe7-8210-4f02-8e3d-031bd20f7c6e",
		      "sku" => "DOQAQ-ULKVP",
		      "price" => 55.19
		   ],
		   [
			  "id" => "c5c3ed25-6594-4b3e-badf-64fd64136641",
		      "sku" => "WKWU8-OZRHS",
		      "price" => 62.9
		   ],
		   [
			  "id" => "20479a15-8cbc-4653-9c39-5a539ea33795",
		      "sku" => "FA8SL-GUD2L",
		      "price" => 43.07
		   ],
		   [
			  "id" => "87220170-3179-4f68-b40a-fe4a8322b159",
		      "sku" => "LACXB-FMY5N",
		      "price" => 71.51
		   ],
		   [
			  "id" => "0a040809-f607-4224-bc65-65d7d3a11ffe",
		      "sku" => "NU6VY-EPPRI",
		      "price" => 33.49
		   ],
		   [
			  "id" => "79a93525-c6e4-4ccf-b8da-113db7f40258",
		      "sku" => "S03OO-GAOQG",
		      "price" => 69.25
		   ],
		   [
			  "id" => "cbdb4c8a-b221-479e-bc56-8e5b020d912b",
		      "sku" => "P7EAE-6AKPE",
		      "price" => 71.99
		   ],
		   [
			  "id" => "64e53cd4-d920-4d7f-bbca-6e0c56c925d5",
		      "sku" => "PSUAX-PMWEK",
		      "price" => 79.74
		   ],
		   [
			  "id" => "9487ed20-f115-47e9-b9e3-9ba8b43d6d66",
		      "sku" => "YOUTA-EAMF8",
		      "price" => 40.31
		   ],
		   [
			  "id" => "c4029d63-bd81-4b04-8795-a7fa6540ab55",
		      "sku" => "MPFD8-DK8N3",
		      "price" => 36
		   ],
		   [
			  "id" => "816a96a5-b674-4d06-a441-521db9c43af9",
		      "sku" => "4CU3X-CMSYE",
		      "price" => 93.84
		   ],
		   [
			  "id" => "01b5f562-6136-4fda-9a2e-1352ffaaaa4d",
		      "sku" => "NI7TD-GQIPM",
		      "price" => 77.07
		   ],
		   [
			  "id" => "c96a44e7-c501-4597-a23c-415a9a88a480",
		      "sku" => "5MTSK-D1UTK",
		      "price" => 77.57
		   ],
		   [
			  "id" => "31b6b3e1-1d60-4df8-859f-bbc74f7c1b43",
		      "sku" => "8BGRJ-FYMVI",
		      "price" => 28.41
		   ],
		   [
			  "id" => "ae822010-7d69-4fac-bbdb-d8925b169b0b",
		      "sku" => "J8X7L-WKYKT",
		      "price" => 23.32
		   ],
		   [
			  "id" => "60f7e404-f91a-4515-ae87-9d72fd21c233",
		      "sku" => "QFDQH-DKWQH",
		      "price" => 56.09
		   ],
		   [
			  "id" => "b2fa893f-670c-479c-909f-4aa0040128c1",
		      "sku" => "4SUYM-YD8KC",
		      "price" => 75.49
		   ],
		   [
			  "id" => "65d8a3d6-8e96-4f5d-ba68-8a47ffef548a",
		      "sku" => "NXSQG-KPANL",
		      "price" => 30.68
		   ],
		   [
			  "id" => "da312564-e75f-45af-b67f-ff4f63c1e2e3",
		      "sku" => "TCMSG-XWO0L",
		      "price" => 96.21
		   ],
		   [
			  "id" => "bb4cb026-569a-491d-a8df-264b56f00a64",
		      "sku" => "U1PPR-RYQYM",
		      "price" => 82.03
		   ],
		   [
			  "id" => "813c71a3-5dbb-466a-9460-2c58859ea82e",
		      "sku" => "LXWDV-EB6OU",
		      "price" => 96.22
		   ],
		   [
			  "id" => "b605aba1-ab4e-46ae-bc17-3d50d3fbaa6c",
		      "sku" => "6HKQY-WWIQ7",
		      "price" => 84.72
		   ],
		   [
			  "id" => "d2aafb42-f0dd-4083-82b8-6671dffa1f09",
		      "sku" => "9B4AA-CVTOG",
		      "price" => 14.76
		   ],
		   [
			  "id" => "19c1d08e-c94f-4571-9ee0-0b9a9f36f6a7",
		      "sku" => "XLTKZ-GU6RK",
		      "price" => 88.01
		   ],
		   [
			  "id" => "d461de7b-9896-470a-9e07-46cacf14d0ac",
		      "sku" => "TJZ2I-X6WXM",
		      "price" => 12.96
		   ],
		   [
			  "id" => "76f289b2-21bc-4858-94f9-be6e181885d5",
		      "sku" => "APWXR-9PH9O",
		      "price" => 11.86
		   ],
		   [
			  "id" => "287b585c-ec8f-4f35-ac38-abccfe1a153f",
		      "sku" => "HPGYC-RXIA9",
		      "price" => 46.59
		   ],
		   [
			  "id" => "51fe4a17-9169-4626-a1fe-847a8cd57055",
		      "sku" => "3S3VU-TZEOJ",
		      "price" => 60.16
		   ],
		   [
			  "id" => "396e6d25-2f06-400a-9b38-054f738505d2",
		      "sku" => "ATKO2-TA3GO",
		      "price" => 26.11
		   ],
		   [
			  "id" => "25eb73d9-a39a-4bc1-8341-7fc235d7e91d",
		      "sku" => "JKL0G-X876V",
		      "price" => 47.15
		   ],
		   [
			  "id" => "46b650c8-fd24-4bf8-8c73-fbd4db0251f7",
		      "sku" => "4BNWU-ZXSJW",
		      "price" => 56.56
		   ],
		   [
			  "id" => "22609fc0-9cc5-46ab-8604-6171a5b65ddb",
		      "sku" => "L2PYE-ECWFT",
		      "price" => 91
		   ],
		   [
			  "id" => "2e5905e1-d614-4c56-ab9b-c9b404c804fd",
		      "sku" => "2OINI-W1ZL9",
		      "price" => 91.32
		   ],
		   [
			  "id" => "579e9c97-57ea-4a93-b831-c1f1ec264f72",
		      "sku" => "XOIEW-OHUV1",
		      "price" => 35
		   ],
		   [
			  "id" => "c0bdfd2c-54b7-49aa-95dc-06cb0a210e1a",
		      "sku" => "ETFAK-BWAHX",
		      "price" => 93.11
		   ],
		   [
			  "id" => "7344c06f-0e80-4cad-826c-ac5a91ce2254",
		      "sku" => "6GFMY-UDPP6",
		      "price" => 68.89
		   ],
		   [
			  "id" => "87148afc-fa4c-46fd-8246-ffcf9dd92bb2",
		      "sku" => "KIQIH-BMNQV",
		      "price" => 31.95
		   ],
		   [
			  "id" => "0e28165e-a46e-4dae-872c-5b33405e8513",
		      "sku" => "W7V2Z-HXLUO",
		      "price" => 30.03
		   ],
		   [
			  "id" => "ab85e04b-9fad-43a2-b516-14de4c312027",
		      "sku" => "JMP7H-PCLH4",
		      "price" => 73.11
		   ],
		   [
			  "id" => "944fbcaf-c0f7-4526-a9a1-fec698da37d2",
		      "sku" => "F98VP-M3T77",
		      "price" => 46.05
		   ],
		   [
			  "id" => "2f0e8717-6d4d-4c8e-8551-94d35a8cc708",
		      "sku" => "5HB7Y-WJOHK",
		      "price" => 51.29
		   ],
		   [
			  "id" => "5cfb8a78-e19a-43fa-83cf-a12682b0c031",
		      "sku" => "PM50R-BUHOC",
		      "price" => 72.52
		   ],
		   [
			  "id" => "0447fc4c-7ef7-4f45-8281-704ab1b3d363",
		      "sku" => "UQGMT-OEKXU",
		      "price" => 13.07
		   ],
		   [
			  "id" => "fc1b1eb4-a337-4135-adc2-fae25e4aa1e8",
		      "sku" => "DR1WL-9IE9D",
		      "price" => 64.42
		   ],
		   [
			  "id" => "ce9857ab-e70c-4d88-b0c0-f228ce80b5ec",
		      "sku" => "W9WW4-NXXFO",
		      "price" => 45
		   ],
		   [
			  "id" => "d5727d97-a719-449b-9313-2d213ca70a5d",
		      "sku" => "EBCNU-BSY4P",
		      "price" => 62.36
		   ],
		   [
			  "id" => "d7b4ceaf-c753-4146-b06f-043724defcdf",
		      "sku" => "QBLHH-YTKJ6",
		      "price" => 52.03
		   ],
		   [
			  "id" => "63d6ec3f-63e3-4bfd-988e-abf6fa0e974f",
		      "sku" => "BVXF1-BNMZF",
		      "price" => 86.96
		   ],
		   [
			  "id" => "dd414c5e-3e6b-4f0e-aa04-2446a7c23cd7",
		      "sku" => "Q7GA6-XL6JR",
		      "price" => 29.1
		   ],
		   [
			  "id" => "0a34e96a-f6a9-4291-b094-06f3b7d1ccc5",
		      "sku" => "ZYP3Z-0JJOF",
		      "price" => 67
		   ],
		   [
			  "id" => "2de08057-52a4-4756-aa34-b090b41a274a",
		      "sku" => "IDLFH-TX81S",
		      "price" => 83.31
		   ],
		   [
			  "id" => "9dd8989b-dd0b-4690-bfc9-2ec5dd8798c7",
		      "sku" => "T70TE-WFB9X",
		      "price" => 90.32
		   ],
		   [
			  "id" => "a6866252-d224-4fd1-afdf-263a10db2d38",
		      "sku" => "MEFLI-ONTXO",
		      "price" => 93.49
		   ],
		   [
			  "id" => "ee6d55c2-6595-4568-877c-89f1e06dc4c1",
		      "sku" => "3B50E-Y4QNC",
		      "price" => 82.2
		   ],
		   [
			  "id" => "005f7195-a0c1-4f05-81df-436be9035bc6",
		      "sku" => "4NKTV-YOZYJ",
		      "price" => 27.52
		   ],
		   [
			  "id" => "c8c5bf5b-fd54-420e-9d91-e726f3cd5c09",
		      "sku" => "ZQE85-IQ2YE",
		      "price" => 25.21
		   ],
		   [
			  "id" => "c0f22aa2-f604-45e3-b10b-95816b0dc56f",
		      "sku" => "SUBT6-IVKDN",
		      "price" => 98.98
		   ],
		   [
			  "id" => "063c6726-7702-497e-9db3-5125551d8cdb",
		      "sku" => "Z9U9X-6WG0X",
		      "price" => 89.63
		   ],
		   [
			  "id" => "22979f4c-3858-4c1c-8f37-11a6ec6eac76",
		      "sku" => "PGXRL-GNSAR",
		      "price" => 75.86
		   ],
		   [
			  "id" => "585947eb-b2fd-414c-8cec-9452ab27c357",
		      "sku" => "QDMYK-QGAVY",
		      "price" => 76.62
		   ],
		   [
			  "id" => "d7e0acde-1c3c-43b2-848d-1c1cceb62adc",
		      "sku" => "VZDJJ-Z7O2P",
		      "price" => 75.08
		   ],
		   [
			  "id" => "93b14d05-b7cf-4bbf-aebc-62c1c784a868",
		      "sku" => "MUC7I-NNPIK",
		      "price" => 14.55
		   ],
		   [
			  "id" => "98cf3c3e-8c84-408c-8f65-addbbda30ea0",
		      "sku" => "KVZRX-5LYHN",
		      "price" => 57.28
		   ],
		   [
			  "id" => "ebc5b8cf-0b9a-46cc-b8e1-96760911ec38",
		      "sku" => "1VVVD-DF5WC",
		      "price" => 93.66
		   ],
		   [
			  "id" => "b77fa58e-8593-4b68-a377-2cca7943508b",
		      "sku" => "X7HHU-H4NIJ",
		      "price" => 95.87
		   ],
		   [
			  "id" => "f7bacc69-73db-430e-a78d-ae4834901972",
		      "sku" => "GGWD4-RFXN4",
		      "price" => 56.15
		   ],
		   [
			  "id" => "f813de28-1aa2-4d30-be84-9e412dd0c253",
		      "sku" => "IDBNB-X9CPF",
		      "price" => 23.32
		   ],
		   [
			  "id" => "ece642ee-5fb0-41cb-bd2e-48d6158bdee6",
		      "sku" => "W2NCB-PISZT",
		      "price" => 27.49
		   ],
		   [
			  "id" => "d60a6eb7-9aed-4e48-bffd-eb0190ef5e32",
		      "sku" => "GNYPF-GTMCF",
		      "price" => 97.56
		   ],
		   [
			  "id" => "1af4174d-e43e-4035-9461-5498d6dfbee9",
		      "sku" => "EERVV-DY3PW",
		      "price" => 98.52
		   ],
		   [
			  "id" => "f3a82505-3954-4ead-b2ad-115982f9ba32",
		      "sku" => "YJG3W-QIRJ9",
		      "price" => 51.7
		   ],
		   [
			  "id" => "46b73360-4d41-4fd8-a5e3-db484f1c053a",
		      "sku" => "4RU1U-P3BAM",
		      "price" => 76.03
		   ],
		   [
			  "id" => "e21984e5-fa5b-497b-8fca-6699b8568c53",
		      "sku" => "CXFWW-OAAPP",
		      "price" => 65.66
		   ],
		   [
			  "id" => "159ded27-1d04-4058-848f-0188e2338902",
		      "sku" => "GTT2D-V6W8I",
		      "price" => 72.78
		   ],
		   [
			  "id" => "ff8f9346-5d1d-4ed6-b00f-601030689ef6",
		      "sku" => "PRCU2-OJBHT",
		      "price" => 52.6
		   ],
		   [
			  "id" => "a5ddef1a-c978-4110-a446-9312e77e1e7f",
		      "sku" => "ZZ4WV-HJON4",
		      "price" => 84.86
		   ],
		   [
			  "id" => "afe88346-0f32-4a13-bdcb-2e421cbcaede",
		      "sku" => "A37KH-SE2FH",
		      "price" => 10.88
		   ],
		   [
			  "id" => "04103861-963a-4763-8e64-7d2dc11b9265",
		      "sku" => "I5MBQ-IOUWN",
		      "price" => 87.62
		   ],
		   [
			  "id" => "73fa39a6-6148-47c0-bf75-3bfcc552ccbf",
		      "sku" => "6DGV6-K4EIP",
		      "price" => 64.15
		   ],
		   [
			  "id" => "1cdc0259-665a-4130-a9d0-e01721ec13ad",
		      "sku" => "BN5NZ-DOTAL",
		      "price" => 62.89
		   ],
		   [
			  "id" => "cdd3a894-0040-4048-a9be-dc733c20e6e0",
		      "sku" => "Y5FWS-TTAQD",
		      "price" => 62.47
		   ],
		   [
			  "id" => "00a7d973-f8e2-40f3-93c6-9ad3b17c93e2",
		      "sku" => "YJ3ZV-KZ5NE",
		      "price" => 78.6
		   ],
		   [
			  "id" => "965a5efd-acfe-41ab-9234-9cf41a272ee9",
		      "sku" => "J0GV4-85RUU",
		      "price" => 55.04
		   ],
		   [
			  "id" => "f15a039b-2990-4a4b-a32b-a681209f3b17",
		      "sku" => "C3DR3-DGEUE",
		      "price" => 97.41
		   ],
		   [
			  "id" => "aa7c9522-5ff8-44db-9a44-005d16ac4719",
		      "sku" => "8RWQX-BHMVV",
		      "price" => 42.45
		   ],
		   [
			  "id" => "bf721b87-66f4-4dc6-bc07-7ed5da7c2f45",
		      "sku" => "D72RW-SLMLX",
		      "price" => 35.16
		   ],
		   [
			  "id" => "dcf9d866-ff07-4ce8-8554-f20c3ad84678",
		      "sku" => "PNZGA-W7QIE",
		      "price" => 22.73
		   ],
		   [
			  "id" => "2b85ce55-4b50-4070-bd0d-5b2926c265d3",
		      "sku" => "GNTNI-G2XQP",
		      "price" => 95.57
		   ],
		   [
			  "id" => "d05f7645-5396-4cfa-b2d8-f4b1c0f22f1d",
		      "sku" => "MH86O-G70GH",
		      "price" => 74.98
		   ],
		   [
			  "id" => "cc588dfe-6493-4d42-9233-9d86e8d8e336",
		      "sku" => "WCYZ6-U8EBM",
		      "price" => 67.79
		   ],
		   [
			  "id" => "839c6174-f734-4ecc-9fad-febb944d83d7",
		      "sku" => "64GMS-DYTPL",
		      "price" => 20.94
		   ],
		   [
			  "id" => "24c56c82-8721-469a-9814-b254572287be",
		      "sku" => "Z1PFL-SFSVI",
		      "price" => 82.1
		   ],
		   [
			  "id" => "20a6bf03-b733-4f1f-9803-91ae9d9dffe9",
		      "sku" => "F68AG-HGB8Q",
		      "price" => 41.3
		   ],
		   [
			  "id" => "931b2441-29a9-4aad-b42b-c0f274d5abf0",
		      "sku" => "2X7YH-8QU48",
		      "price" => 37.59
		   ],
		   [
			  "id" => "eebdea25-df41-4b8e-a7cb-f1e9b4953f27",
		      "sku" => "FDUVI-VPCNO",
		      "price" => 17.9
		   ],
		   [
			  "id" => "0f48dd87-fa0f-4470-aba7-4096fa0f075d",
		      "sku" => "4FRQ0-LOHAK",
		      "price" => 37.53
		   ],
		   [
			  "id" => "a3ac5100-fc29-4aa6-bf92-de8b4034eef0",
		      "sku" => "Q9JCX-MKNXH",
		      "price" => 17.67
		   ],
		   [
			  "id" => "26beb663-28f2-4f78-827c-fd2262b8f919",
		      "sku" => "BWRYF-SQSK7",
		      "price" => 45.2
		   ],
		   [
			  "id" => "c4dd7dfa-c83a-4778-b8dc-73afafca3376",
		      "sku" => "XZ0UK-ZND7H",
		      "price" => 97.46
		   ],
		   [
			  "id" => "e0d5e4ae-c221-4ac6-b9b9-7100ad1c5696",
		      "sku" => "VWFWR-ZKUJ2",
		      "price" => 87.2
		   ],
		   [
			  "id" => "6b0d03a4-5c59-4308-9ad7-6a0dd63e5c6e",
		      "sku" => "JXWDH-CVDTG",
		      "price" => 18.47
		   ],
		   [
			  "id" => "aa58dedf-ce07-4635-b135-189015238fe9",
		      "sku" => "RBNWT-SVRRO",
		      "price" => 51.38
		   ],
		   [
			  "id" => "37546b24-fde6-4f40-838e-25a7f7ad57cd",
		      "sku" => "PYSJO-CLYVS",
		      "price" => 26.11
		   ],
		   [
			  "id" => "ac998412-dac4-4e38-8271-69a0a8fef7fc",
		      "sku" => "IITDF-DLB3W",
		      "price" => 64.86
		   ],
		   [
			  "id" => "8d79ef6a-c7f3-4f49-874b-c26d57c620ac",
		      "sku" => "NGJP6-RVCMV",
		      "price" => 71.2
		   ],
		   [
			  "id" => "95f034a8-1c69-49da-9222-b28610e5a363",
		      "sku" => "HKZ4E-I0DTA",
		      "price" => 30.34
		   ],
		   [
			  "id" => "ed35a22f-9818-4505-9540-abbf54a8aca6",
		      "sku" => "HSCPC-EFUZQ",
		      "price" => 32.24
		   ],
		   [
			  "id" => "77b15f3c-8264-4a61-bca6-4c38162f1c78",
		      "sku" => "JARXV-WO1V1",
		      "price" => 34.25
		   ],
		   [
			  "id" => "5e24e7cd-864a-454a-88fe-59859143c170",
		      "sku" => "PAQ8B-5IKMT",
		      "price" => 91.36
		   ],
		   [
			  "id" => "eb53bd0a-ee3b-464c-8cd9-57ff9d73c3ff",
		      "sku" => "JMGFS-CXZ61",
		      "price" => 76.62
		   ],
		   [
			  "id" => "b65920d5-7300-497f-8ae3-7821754f1d9a",
		      "sku" => "P6RQK-LTZPO",
		      "price" => 56.53
		   ],
		   [
			  "id" => "15d7ed05-0c0a-4851-8625-580e136a947e",
		      "sku" => "UPKWY-MVAHH",
		      "price" => 66.78
		   ],
		   [
			  "id" => "267c0510-d4d8-4dd6-af8b-707957383469",
		      "sku" => "BLN8N-AIRU1",
		      "price" => 13.96
		   ],
		   [
			  "id" => "4bef6757-04a6-4d38-a988-b56f883cc321",
		      "sku" => "RB16N-CCESY",
		      "price" => 43.21
		   ],
		   [
			  "id" => "3022b0a1-0648-4ac9-b44c-e149abd33b78",
		      "sku" => "NG83D-HFAGT",
		      "price" => 51.91
		   ],
		   [
			  "id" => "44b54821-b06a-4a87-8e02-da049b8d037f",
		      "sku" => "UWPH1-HC4YH",
		      "price" => 61.06
		   ],
		   [
			  "id" => "9cf0bd61-60e5-4a89-bbca-e71e1a041028",
		      "sku" => "7VRK3-NF6QB",
		      "price" => 43.28
		   ],
		   [
			  "id" => "7fab5fb5-63d6-4318-9573-f869e9ff7092",
		      "sku" => "5A3BV-2J25U",
		      "price" => 37.87
		   ],
		   [
			  "id" => "d8ababda-575b-466d-860c-dac6974dfc0a",
		      "sku" => "2JGJS-ZUVV3",
		      "price" => 78.94
		   ],
		   [
			  "id" => "84767a2a-c436-497f-8fb4-8db38bf60106",
		      "sku" => "2PKE1-L5E8Z",
		      "price" => 20.87
		   ],
		   [
			  "id" => "a9d8040d-5987-485d-97c0-217dcb6c7ca9",
		      "sku" => "AJNLU-ADHHE",
		      "price" => 61.94
		   ],
		   [
			  "id" => "04692572-1c8b-4644-8d96-bf19c6911e5e",
		      "sku" => "GEZ9G-TFKMO",
		      "price" => 56.01
		   ],
		   [
			  "id" => "d26042a7-83c7-4602-bc32-7e02fac75de1",
		      "sku" => "UJ7KY-WDW7Q",
		      "price" => 26.84
		   ],
		   [
			  "id" => "85446b3b-3479-453f-a116-731e9f3119ed",
		      "sku" => "ZCSEX-RUYVY",
		      "price" => 94.98
		   ],
		   [
			  "id" => "080454e1-ca39-4941-aff2-56b804a5445b",
		      "sku" => "P7PJD-HPTMX",
		      "price" => 86.9
		   ],
		   [
			  "id" => "a3c61a6c-ad94-42aa-a982-6d55c6530a9f",
		      "sku" => "FU02M-ACBOL",
		      "price" => 81
		   ],
		   [
			  "id" => "5fdbeeaa-c584-47f8-8b2e-a85689b08603",
		      "sku" => "RNDSL-TUUOC",
		      "price" => 65.7
		   ],
		   [
			  "id" => "d1580888-76aa-4d79-ae64-a8b3e6542eeb",
		      "sku" => "2SHFV-O7FXU",
		      "price" => 96.51
		   ],
		   [
			  "id" => "c3511b27-65b3-4c4f-ac49-7ff32a3d3067",
		      "sku" => "YWPVQ-INEQY",
		      "price" => 44.13
		   ],
		   [
			  "id" => "024ccbb6-2647-48b8-9135-26cb17243ebf",
		      "sku" => "ZFKQS-HXSZ8",
		      "price" => 85.28
		   ],
		   [
			  "id" => "3702b852-aada-491b-9eaa-231987d1a7db",
		      "sku" => "LQTFP-YKROB",
		      "price" => 52.7
		   ],
		   [
			  "id" => "c368b8ca-6ddb-4717-b98f-9fd673d1e5ac",
		      "sku" => "GAQMO-K8UO2",
		      "price" => 24.23
		   ],
		   [
			  "id" => "5b5f2b7d-04fd-4625-8313-3e019db4c809",
		      "sku" => "RBI9W-98Q7Z",
		      "price" => 38.32
		   ],
		   [
			  "id" => "4ff6e959-fd6d-47ae-96c6-c554f9f2181a",
		      "sku" => "9G0YF-DSHOX",
		      "price" => 18.18
		   ],
		   [
			  "id" => "ede78efd-964c-40c7-9425-1290052d826f",
		      "sku" => "V9OT3-GXGZO",
		      "price" => 44.08
		   ],
		   [
			  "id" => "ba119152-7f7d-400b-8b13-1758aa34a090",
		      "sku" => "00KXH-H5X7O",
		      "price" => 78.41
		   ],
		   [
			  "id" => "a49aa65d-6721-42ed-9387-0f232cc08659",
		      "sku" => "M1FMC-XD2CQ",
		      "price" => 70.23
		   ],
		   [
			  "id" => "d7bbf1ea-3398-4e6b-b740-c165dbbb927f",
		      "sku" => "KTGYR-XVRQD",
		      "price" => 85.97
		   ],
		   [
			  "id" => "dd58004f-fefa-4c39-a4ef-240a7147d4b0",
		      "sku" => "IPNMY-G8WPP",
		      "price" => 11.46
		   ],
		   [
			  "id" => "e8192dd1-e929-4baf-b82a-cbf229336f94",
		      "sku" => "XEI56-KKVHL",
		      "price" => 96.08
		   ],
		   [
			  "id" => "7af2dc9b-789c-4a86-9f89-2e319f2902cd",
		      "sku" => "WTMKC-GGAV7",
		      "price" => 16.98
		   ],
		   [
			  "id" => "c279647e-13ea-4ba8-9bce-e4643a21250f",
		      "sku" => "PTOCU-S4ERI",
		      "price" => 52.06
		   ],
		   [
			  "id" => "d35e977c-0d38-4d52-b1b4-6bdc939fb2d0",
		      "sku" => "WOZKW-4K2ZR",
		      "price" => 76.32
		   ],
		   [
			  "id" => "6613b605-a1ac-44ea-a810-cf6851f95252",
		      "sku" => "JMJJL-ONHGB",
		      "price" => 92.64
		   ],
		   [
			  "id" => "1dba148f-8e58-4f1e-a446-349fd8e4c081",
		      "sku" => "XG1EH-VAWHE",
		      "price" => 55.35
		   ],
		   [
			  "id" => "517ebfea-d157-4fc0-8a0c-940f65404249",
		      "sku" => "GSKNY-AZ91V",
		      "price" => 84.14
		   ],
		   [
			  "id" => "ea0e3663-d259-4cc7-a3a9-5feb7524c295",
		      "sku" => "2KDPF-VEKWH",
		      "price" => 91.14
		   ],
		   [
			  "id" => "1994b34d-e636-49b9-9e4f-f654252ad211",
		      "sku" => "FJWZW-DE8KT",
		      "price" => 61.02
		   ],
		   [
			  "id" => "ba388a67-9b7e-4f72-804b-640865b3709d",
		      "sku" => "FELYG-PWUW5",
		      "price" => 79.28
		   ],
		   [
			  "id" => "7816429b-c8da-4120-aa81-827db7ceb6e2",
		      "sku" => "GDHT1-JFYSI",
		      "price" => 37.39
		   ],
		   [
			  "id" => "088eccce-ef3d-478b-9d67-58e6da3cff5e",
		      "sku" => "UFCHT-PKA5U",
		      "price" => 10.54
		   ],
		   [
			  "id" => "b928edf6-9712-4f9d-b4d0-2602389849e7",
		      "sku" => "WH8RX-CJFQU",
		      "price" => 45.73
		   ],
		   [
			  "id" => "c7791334-c42c-48bf-9bb6-4fe9199b264f",
		      "sku" => "AOS6Z-ZEU6P",
		      "price" => 32.05
		   ],
		   [
			  "id" => "62b3e3f0-1a9a-4d45-8ddb-87b3a169d868",
		      "sku" => "LL6TC-WQVBK",
		      "price" => 85.17
		   ],
		   [
			  "id" => "cf205df7-0ab7-4d30-8f5f-65060f3d697a",
		      "sku" => "ZMLA4-4LTZD",
		      "price" => 76.48
		   ],
		   [
			  "id" => "e24dfe13-9f50-4d6d-a74c-3dc8e01418b8",
		      "sku" => "NJMGP-4Z5U6",
		      "price" => 62.64
		   ],
		   [
			  "id" => "322d9cfd-1b2f-47a6-b235-a5aacf3ad174",
		      "sku" => "IOJQP-HTOVX",
		      "price" => 62.33
		   ],
		   [
			  "id" => "5fa60d45-667c-4eed-ac8a-5648634d320f",
		      "sku" => "B5625-ALECP",
		      "price" => 51.18
		   ],
		   [
			  "id" => "16419a71-4151-493d-bcd5-6eb03a1aaa8a",
		      "sku" => "APBZP-UB7U5",
		      "price" => 27.84
		   ],
		   [
			  "id" => "00025ce2-8ec4-4918-8928-ac6c6d45417a",
		      "sku" => "ZZVJN-O1RCU",
		      "price" => 43.16
		   ],
		   [
			  "id" => "341e6f55-f0ad-4251-b3a2-4ea72121acc0",
		      "sku" => "YWDL1-ZG1EK",
		      "price" => 44.63
		   ],
		   [
			  "id" => "c22e4438-53e8-498f-9f83-963e242e1a2b",
		      "sku" => "0MF6N-FRMFY",
		      "price" => 55.3
		   ],
		   [
			  "id" => "a3c62ebf-6d6b-4567-a668-7c630d6279bf",
		      "sku" => "SB4RV-ZYDYG",
		      "price" => 12.11
		   ],
		   [
			  "id" => "99a3690d-b858-47a6-995f-fa6acd66e8dc",
		      "sku" => "3NDJ5-Y3K8W",
		      "price" => 48.4
		   ],
		   [
			  "id" => "3a3d139d-4b2b-43b0-8c11-2da1cba01f31",
		      "sku" => "PFACG-PIPUS",
		      "price" => 25.46
		   ],
		   [
			  "id" => "cadc1aa0-eb6d-4319-9dea-73ab50338fe2",
		      "sku" => "3VALI-XBV3C",
		      "price" => 27.79
		   ],
		   [
			  "id" => "76797a3a-d336-47a8-b0d8-da272b9ed83e",
		      "sku" => "QWEEV-YAHNS",
		      "price" => 88.12
		   ],
		   [
			  "id" => "b1e3efb0-4d80-47f7-895c-bf1d6ffebc5e",
		      "sku" => "4XGYW-QINUG",
		      "price" => 25.15
		   ],
		   [
			  "id" => "834cd581-133d-4cd3-9703-bed5ebbca25d",
		      "sku" => "GYUK6-UJCUX",
		      "price" => 40.32
		   ],
		   [
			  "id" => "1097e453-049e-4be8-8782-e65100bca315",
		      "sku" => "UCYKA-SSOPO",
		      "price" => 69.65
		   ],
		   [
			  "id" => "5d00f6de-11b2-4954-862a-4505ca51678b",
		      "sku" => "YFYOH-WZMGT",
		      "price" => 53.41
		   ],
		   [
			  "id" => "5abd2b0d-55c9-4644-b744-65f894a83496",
		      "sku" => "YW6YG-MQGU4",
		      "price" => 75.7
		   ],
		   [
			  "id" => "9f84d297-0470-457f-9a18-e2cefc10e64f",
		      "sku" => "DMJUR-VHDIZ",
		      "price" => 70.57
		   ],
		   [
			  "id" => "5d18bebe-6786-48e9-b095-12c715259419",
		      "sku" => "A3QBU-YT1FK",
		      "price" => 42.65
		   ],
		   [
			  "id" => "ddfacee5-c45a-4508-aea3-10032ca818a9",
		      "sku" => "S6BZN-TJKDF",
		      "price" => 29.4
		   ],
		   [
			  "id" => "7f2ef2af-4795-4ba3-b2b9-1d907a095ead",
		      "sku" => "IAJA6-AJH6H",
		      "price" => 61.2
		   ],
		   [
			  "id" => "253acd95-b932-4a34-911a-004cb1967d56",
		      "sku" => "EXRWM-MGKOB",
		      "price" => 96.66
		   ],
		   [
			  "id" => "70f4ce44-24bc-4cec-9d1a-e2bf520b76b4",
		      "sku" => "Z8V76-J9IN5",
		      "price" => 31.59
		   ],
		   [
			  "id" => "72c1efad-bc97-43ad-a53a-828a0bea2899",
		      "sku" => "OK1JO-YV3EX",
		      "price" => 41.15
		   ],
		   [
			  "id" => "ff204af0-8bf9-48d8-84ce-36e250ef311f",
		      "sku" => "CTQWZ-YYNBU",
		      "price" => 71.19
		   ],
		   [
			  "id" => "cce641c0-36e6-4c4e-8d1d-6f0b91d1fbc5",
		      "sku" => "01H7E-TLBI6",
		      "price" => 43.92
		   ],
		   [
			  "id" => "01c4b5b2-97aa-4e2c-889c-791b8afdae89",
		      "sku" => "PYDS8-XL3EE",
		      "price" => 77.28
		   ],
		   [
			  "id" => "dd6b8a75-30dc-4380-b72d-53045478fd9e",
		      "sku" => "J7OQL-GCWBP",
		      "price" => 40.62
		   ],
		   [
			  "id" => "3881ab12-8563-495a-aece-b89f2584b60d",
		      "sku" => "WCNBT-R0UCL",
		      "price" => 71.2
		   ],
		   [
			  "id" => "3cc8cd5f-b7ed-4978-8d3e-530b93e472aa",
		      "sku" => "A14HW-UISR1",
		      "price" => 94.8
		   ],
		   [
			  "id" => "f4448ce3-1b16-4b93-ad05-b7d368d7c5b6",
		      "sku" => "UWE2D-SFDWK",
		      "price" => 67.62
		   ],
		   [
			  "id" => "137dbac6-ab98-4c3b-9c2a-525ce3e69f08",
		      "sku" => "ZWJBI-FJ63F",
		      "price" => 62.68
		   ],
		   [
			  "id" => "dc24785b-a31d-4f0f-b0f4-da06947da28a",
		      "sku" => "PGNAI-YMYNS",
		      "price" => 98.7
		   ],
		   [
			  "id" => "33a148d5-54fd-4d5b-a06c-ebbaa5970702",
		      "sku" => "EUOHN-TGSYV",
		      "price" => 92.76
		   ],
		   [
			  "id" => "2ab73cb5-1a26-465a-a01e-b14a91b6e635",
		      "sku" => "1D5AP-EU7VC",
		      "price" => 18.48
		   ],
		   [
			  "id" => "20226722-249e-416d-9777-681fedf733bc",
		      "sku" => "C76RI-NKGUG",
		      "price" => 38.77
		   ],
		   [
			  "id" => "9e70852b-3935-4991-9a6d-79c6564e5b1a",
		      "sku" => "J8JYA-FEXRG",
		      "price" => 22.15
		   ],
		   [
			  "id" => "e33fc8c5-d76d-44cd-9ee7-a0acddf0c321",
		      "sku" => "3CLBY-SMYTU",
		      "price" => 89.53
		   ],
		   [
			  "id" => "66edf954-9f26-48c8-b772-6f22aea5e00c",
		      "sku" => "MW1AU-GJTOG",
		      "price" => 13
		   ],
		   [
			  "id" => "aa1e134b-956e-45c4-88a4-f9ebaba78aee",
		      "sku" => "L9HPO-HJF1Q",
		      "price" => 76.26
		   ],
		   [
			  "id" => "5137ffa0-0912-46cd-8334-6fee90c464e4",
		      "sku" => "W8QIJ-IROWJ",
		      "price" => 80.55
		   ],
		   [
			  "id" => "ac451e7b-f981-4eff-bd3a-492295ce2333",
		      "sku" => "DMULW-GPAYP",
		      "price" => 14.07
		   ],
		   [
			  "id" => "b629fc05-09b5-46f1-a2f6-b68d4c26682c",
		      "sku" => "GUGFK-29BVN",
		      "price" => 63.22
		   ],
		   [
			  "id" => "89d6c537-ef8a-41ca-8736-ab8d99c3d4d5",
		      "sku" => "IRARR-YF0UF",
		      "price" => 32.33
		   ],
		   [
			  "id" => "82d3e90b-bd61-4d62-b87a-4359c4065881",
		      "sku" => "UEAJ3-GJTKT",
		      "price" => 52.18
		   ],
		   [
			  "id" => "c0a99994-0cd0-41bf-be79-749d53b9e364",
		      "sku" => "V3EU4-4HMWB",
		      "price" => 91.28
		   ],
		   [
			  "id" => "92803738-8930-4fe6-89b7-206dc9b4d182",
		      "sku" => "TGY1P-8UUUF",
		      "price" => 57.16
		   ],
		   [
			  "id" => "fd16aff1-abc0-4f17-af87-1c10ee88bb64",
		      "sku" => "P88JI-WV6KB",
		      "price" => 42.81
		   ],
		   [
			  "id" => "39b7d873-4f85-4d09-8b05-773b5beff6ca",
		      "sku" => "YVCPW-BSWCF",
		      "price" => 63.3
		   ],
		   [
			  "id" => "f05b6319-26a2-4d9a-930d-2c493aee8c48",
		      "sku" => "EIIEV-XGENX",
		      "price" => 94.43
		   ],
		   [
			  "id" => "7a22b23c-1ef5-415e-917d-48eb16650fcf",
		      "sku" => "MT5DA-DVZIG",
		      "price" => 55.44
		   ],
		   [
			  "id" => "d952cba9-d6a4-4a14-89fe-c08873f1348f",
		      "sku" => "KA4MJ-EDINK",
		      "price" => 47.03
		   ],
		   [
			  "id" => "2e109b9c-6e5e-4b56-9743-89f61ad5ce69",
		      "sku" => "DNHIQ-35LGS",
		      "price" => 84.49
		   ],
		   [
			  "id" => "3251180e-0d81-40b3-97f7-105a19bfee07",
		      "sku" => "DNN1C-RJPJM",
		      "price" => 30.34
		   ],
		   [
			  "id" => "baf8151f-9a1f-4ac0-93f3-7426e99ad3f3",
		      "sku" => "EX2DG-E6DA9",
		      "price" => 15.82
		   ],
		   [
			  "id" => "8dab4317-15b3-479f-a735-647b62e8de79",
		      "sku" => "PUIYI-WBK3B",
		      "price" => 66.9
		   ],
		   [
			  "id" => "9c76d65c-15b7-4e15-9744-5bf2b80a1a5e",
		      "sku" => "XOIF3-PDMM0",
		      "price" => 49.39
		   ],
		   [
			  "id" => "812cdb1a-67a5-460e-8e28-ea39b31b2f7d",
		      "sku" => "RNFDZ-AGWDM",
		      "price" => 43.93
		   ],
		   [
			  "id" => "abe7dfee-26a5-4e7f-b5fd-3026f00c8590",
		      "sku" => "QNTV4-RPRCJ",
		      "price" => 57.59
		   ],
		   [
			  "id" => "2f5632df-c70c-4948-9829-d870ecb170c8",
		      "sku" => "65WQ4-JX9E2",
		      "price" => 10.32
		   ],
		   [
			  "id" => "eec74335-65c8-4c33-b5c5-b4ef210671ac",
		      "sku" => "WHKUH-BAJDB",
		      "price" => 99.27
		   ],
		   [
			  "id" => "b4c884f3-bc05-48c5-a1f5-328ebe68439b",
		      "sku" => "MTHLM-CBYPT",
		      "price" => 68.99
		   ],
		   [
			  "id" => "2b2a7089-27cc-4605-b65f-1de65c1f6d6b",
		      "sku" => "6PPDH-E3XPD",
		      "price" => 40.28
		   ],
		   [
			  "id" => "a9b89cfa-b0a6-479a-881b-9fca7bfb4b62",
		      "sku" => "M8GIR-GO76C",
		      "price" => 77.41
		   ],
		   [
			  "id" => "a49970b0-50df-43ce-b95e-e76752ff79f5",
		      "sku" => "C8IYN-8KGWS",
		      "price" => 78.35
		   ],
		   [
			  "id" => "509393aa-5c8b-4d5f-8448-d8edd0ba7f95",
		      "sku" => "CYFTM-5TESN",
		      "price" => 80.72
		   ],
		   [
			  "id" => "fc0c6cb6-8418-4dc7-bd6c-2a270ad6ee1f",
		      "sku" => "LKUKD-TMYZP",
		      "price" => 33.04
		   ],
		   [
			  "id" => "7562fcb1-fa2a-4be3-bf18-983f7ec01e72",
		      "sku" => "W5HEX-KIIZY",
		      "price" => 48.53
		   ],
		   [
			  "id" => "96ddca27-fc8b-4a48-996f-1052c5654cfc",
		      "sku" => "DRFWT-RX1HF",
		      "price" => 28.45
		   ],
		   [
			  "id" => "a3388d03-86f9-47a6-b652-a1f8cca3fc01",
		      "sku" => "IIZK2-VRBDE",
		      "price" => 87.3
		   ],
		   [
			  "id" => "21861a7b-8893-42ad-9386-7669f9d7a78b",
		      "sku" => "HAFU7-160O6",
		      "price" => 66.04
		   ],
		   [
			  "id" => "7e8afbe2-a557-437b-a7cf-599121feeed0",
		      "sku" => "BJCNX-FABFK",
		      "price" => 47.27
		   ],
		   [
			  "id" => "5305137e-a61f-4222-8401-1199372f657c",
		      "sku" => "HVPFW-IQ4M1",
		      "price" => 77.24
		   ],
		   [
			  "id" => "05c96765-2299-4dad-9aab-d87b0418a5fb",
		      "sku" => "JYWLB-9W6WI",
		      "price" => 15.29
		   ],
		   [
			  "id" => "e89e0acb-dc64-46c6-873d-97b0c9999523",
		      "sku" => "573CD-KZ3BW",
		      "price" => 69.17
		   ],
		   [
			  "id" => "9ec55d65-c6f3-4f20-8d58-c5d72ff989f4",
		      "sku" => "SAUMP-I63VQ",
		      "price" => 99.34
		   ],
		   [
			  "id" => "36c68d28-6ab0-42db-9dcc-50159afea450",
		      "sku" => "JR2G5-6GAWQ",
		      "price" => 40.26
		   ],
		   [
			  "id" => "4cc000ed-552d-431a-a94d-cb34e454cb8d",
		      "sku" => "LZRJC-FBJIV",
		      "price" => 91.95
		   ],
		   [
			  "id" => "76e59d4c-34a9-47d6-8934-4e7c039a189b",
		      "sku" => "LCFLU-NBMAE",
		      "price" => 78.6
		   ],
		   [
			  "id" => "03a4f86a-157d-4979-a324-c12d75157007",
		      "sku" => "L22YQ-IKEHN",
		      "price" => 38.53
		   ],
		   [
			  "id" => "db7199e2-e073-482a-bfeb-fc460e1d97d7",
		      "sku" => "Q6CPX-0RO3G",
		      "price" => 30.88
		   ],
		   [
			  "id" => "f2b42a7f-5194-43d8-a7bd-adff77731425",
		      "sku" => "KSMXM-HFSQM",
		      "price" => 36.8
		   ],
		   [
			  "id" => "c5fc01d8-19e6-4942-b9e9-fc6e6174a073",
		      "sku" => "B62K6-4FDV4",
		      "price" => 13.88
		   ],
		   [
			  "id" => "696c9f2d-dc8d-442c-bf01-4476704d2b58",
		      "sku" => "21VJF-OEVA6",
		      "price" => 40.66
		   ],
		   [
			  "id" => "3ab49fe2-17d5-46ee-849d-d1aa7449eee1",
		      "sku" => "V3HY7-XGMUO",
		      "price" => 89.57
		   ],
		   [
			  "id" => "2e0bb72d-6c72-4aad-9070-0247dfaffd4e",
		      "sku" => "D90Y4-TCMFL",
		      "price" => 38.33
		   ],
		   [
			  "id" => "61de6751-8232-4d7a-b1df-a6f2af147a08",
		      "sku" => "CMOYZ-BCES3",
		      "price" => 42.16
		   ],
		   [
			  "id" => "8e302fe5-13c5-4d03-896f-7e5a82d8513b",
		      "sku" => "1VEWE-ZQVIV",
		      "price" => 34.93
		   ],
		   [
			  "id" => "45f1dd92-b377-4e76-b88f-28132d7c1001",
		      "sku" => "T0KTK-KSEIV",
		      "price" => 41.25
		   ],
		   [
			  "id" => "99a9cc00-ad48-41cf-9f32-a3ea6ef6fdb2",
		      "sku" => "XUEW2-NLQA7",
		      "price" => 27.14
		   ],
		   [
			  "id" => "3ab07271-bdcf-422a-b119-e5ebebc6cee8",
		      "sku" => "Z8GAW-RW2Y4",
		      "price" => 59.45
		   ],
		   [
			  "id" => "c7535f5f-b8e3-4ea9-b3dd-989b47a245ac",
		      "sku" => "V3U94-HBYIK",
		      "price" => 83.91
		   ],
		   [
			  "id" => "5e72a2fa-6948-4419-aabd-00cfc38bcf03",
		      "sku" => "MPNIF-YH3SF",
		      "price" => 14.5
		   ],
		   [
			  "id" => "a47daf69-b16e-42d6-91f2-8d56aa2f0b9e",
		      "sku" => "E8XKK-1BWAK",
		      "price" => 83.41
		   ],
		   [
			  "id" => "572504a5-a325-4fbc-81ba-3ac4fede4b2b",
		      "sku" => "EXCOF-HFT53",
		      "price" => 85.39
		   ],
		   [
			  "id" => "b09c27a4-9428-4641-ba9a-0b15b0e813b8",
		      "sku" => "VOBG6-YQZM5",
		      "price" => 73.53
		   ],
		   [
			  "id" => "96f2bcdd-3274-431f-8eb2-96272a0e0dd3",
		      "sku" => "CVNPN-2S8RN",
		      "price" => 60.68
		   ],
		   [
			  "id" => "a07231c2-5a60-409f-8ecd-530e5398b562",
		      "sku" => "P2N6S-AZTNB",
		      "price" => 25.38
		   ],
		   [
			  "id" => "0b5e667a-9062-4898-af90-aa2729bf0c17",
		      "sku" => "LLWWT-KJZFP",
		      "price" => 24.49
		   ],
		   [
			  "id" => "d306e96e-2060-493c-8937-2530a8dce6a0",
		      "sku" => "T84YF-YLAQQ",
		      "price" => 48.92
		   ],
		   [
			  "id" => "a09a8bd0-38b4-479f-bb44-3c1b59bc24c0",
		      "sku" => "4QTSA-EFOAV",
		      "price" => 68.87
		   ],
		   [
			  "id" => "0c29af48-b492-4c77-86e2-4ecdc9e66764",
		      "sku" => "OLCND-5PTPN",
		      "price" => 63.02
		   ],
		   [
			  "id" => "ddd6506c-5e4a-48e3-beed-55de14a7d6a3",
		      "sku" => "SSOF6-QEQGG",
		      "price" => 20.75
		   ],
		   [
			  "id" => "b66f64d8-f627-47e8-a865-059e49fbdaa4",
		      "sku" => "GSCPO-GCB0Q",
		      "price" => 16.59
		   ],
		   [
			  "id" => "df693103-959a-4448-b5a5-b8f44d7ec61c",
		      "sku" => "TQUJP-624WQ",
		      "price" => 78.46
		   ],
		   [
			  "id" => "75a91907-a0e8-4617-8cb9-8df26959ef07",
		      "sku" => "EJ6PN-DD9TV",
		      "price" => 54.09
		   ],
		   [
			  "id" => "ea1484e3-da70-46ec-bca6-8fa7606ccc97",
		      "sku" => "L80BG-LK83Y",
		      "price" => 79.42
		   ],
		   [
			  "id" => "2fbdc12c-42ee-4c2c-b026-7b0d9ef186b5",
		      "sku" => "YKX7J-4HMTN",
		      "price" => 57.52
		   ],
		   [
			  "id" => "ae22bcdd-f267-44ee-9b7e-46808dad0e7a",
		      "sku" => "AWHGB-EZUMD",
		      "price" => 63.72
		   ],
		   [
			  "id" => "b322d72a-47ec-4eb6-858a-42b8588fa919",
		      "sku" => "C735H-9XTNQ",
		      "price" => 45.89
		   ],
		   [
			  "id" => "6ac352d3-a34e-489b-a856-3fd6bf4e5435",
		      "sku" => "4CUZ6-4ZRWS",
		      "price" => 14
		   ],
		   [
			  "id" => "260c4244-5973-4a11-ab26-bac7eb6d43bd",
		      "sku" => "LR7PE-F84AY",
		      "price" => 88.58
		   ],
		   [
			  "id" => "626808af-5a00-4430-bffc-8c34153fb4da",
		      "sku" => "BGPKG-WP9R8",
		      "price" => 57.14
		   ],
		   [
			  "id" => "2342529e-6cea-4ec3-8efc-5465cc532535",
		      "sku" => "KNLMJ-IQUZH",
		      "price" => 38.32
		   ],
		   [
			  "id" => "7990eca4-499f-4338-8fe3-545d2b6fb2f9",
		      "sku" => "EDRRJ-QBO5O",
		      "price" => 69.69
		   ],
		   [
			  "id" => "0ba07de6-760c-4f65-b623-8b21ff176b9d",
		      "sku" => "9EHGT-YGPPF",
		      "price" => 24.81
		   ],
		   [
			  "id" => "b197ed8a-a25e-4b1e-8062-bb7b62ccbb8e",
		      "sku" => "VGXEX-POYNX",
		      "price" => 68.74
		   ],
		   [
			  "id" => "e8c3e539-072c-4c05-9159-b1295172e1f5",
		      "sku" => "EBETQ-US9DW",
		      "price" => 93.47
		   ],
		   [
			  "id" => "871a8e75-47bb-4790-ba21-512326763cd7",
		      "sku" => "VVZZB-MEIP2",
		      "price" => 91
		   ],
		   [
			  "id" => "3469f88d-3bab-45ea-9877-918e4e9322b4",
		      "sku" => "OJ99L-0BTKU",
		      "price" => 32.86
		   ],
		   [
			  "id" => "dcc81147-b0d4-43c9-995a-5aadf0f2433a",
		      "sku" => "IMXEX-U1DC2",
		      "price" => 81.85
		   ],
		   [
			  "id" => "5cd0d8e8-d8df-4554-a844-5700c0bb53da",
		      "sku" => "ZAUBW-GRZJZ",
		      "price" => 21.89
		   ],
		   [
			  "id" => "25e8e43e-c5a4-426a-9466-34acd94a4919",
		      "sku" => "6BIXK-RM9IT",
		      "price" => 23.98
		   ],
		   [
			  "id" => "95c955fa-3b0c-4778-8407-27265662d9b3",
		      "sku" => "YDVPB-O9X3H",
		      "price" => 45.52
		   ],
		   [
			  "id" => "ab9dae66-ab04-41a1-8c5f-05dc9b624d42",
		      "sku" => "XNXN7-B0T4C",
		      "price" => 18.38
		   ],
		   [
			  "id" => "790ede91-4793-494a-ad99-154548765ffc",
		      "sku" => "8MV08-I5GSY",
		      "price" => 22.92
		   ],
		   [
			  "id" => "b3c9e754-159f-4ebe-a70d-955c0126a33b",
		      "sku" => "XAGMR-U7AJG",
		      "price" => 49.38
		   ],
		   [
			  "id" => "0991f2c5-8b26-4c1f-b073-1ce17a02d3bc",
		      "sku" => "C36GJ-JYW2F",
		      "price" => 68.65
		   ],
		   [
			  "id" => "508bae19-cbde-4c75-b374-b8307e869065",
		      "sku" => "REBDW-ZVWKI",
		      "price" => 39.54
		   ],
		   [
			  "id" => "27db4d67-867f-4dfa-a4a3-eb5214834dec",
		      "sku" => "JRVXO-4OIK3",
		      "price" => 27.73
		   ],
		   [
			  "id" => "e88ef04f-9883-4603-96ed-33dc538f52d3",
		      "sku" => "DH8ZE-JB3I6",
		      "price" => 62.97
		   ],
		   [
			  "id" => "e2415cd8-410f-4656-874e-e5a1108d3757",
		      "sku" => "IMJ6C-GF9PD",
		      "price" => 87.3
		   ],
		   [
			  "id" => "b31484be-6895-4ac5-86fe-451e6a5186b2",
		      "sku" => "OFID4-UWCJQ",
		      "price" => 75.16
		   ],
		   [
			  "id" => "a53ea151-1846-4915-b6d1-e90f19a2bdf0",
		      "sku" => "3JTLI-KZDYX",
		      "price" => 10.59
		   ],
		   [
			  "id" => "7d3b6bd8-a8ef-4daa-aef7-5a71e69b5dd9",
		      "sku" => "NUEWT-ZAHOJ",
		      "price" => 49.92
		   ],
		   [
			  "id" => "66ae24ff-0203-4f27-a667-80f3e44fbcf8",
		      "sku" => "OVGZ4-5DRTN",
		      "price" => 54.78
		   ],
		   [
			  "id" => "416c967a-74f6-4f3c-9d66-cc5a70610914",
		      "sku" => "GT39A-Y4UZG",
		      "price" => 56.1
		   ],
		   [
			  "id" => "9937d204-e0a5-44bb-a4cf-24c9be94ab0d",
		      "sku" => "TOLJD-2VM3C",
		      "price" => 50.85
		   ],
		   [
			  "id" => "f5efd946-b13f-4433-b947-7b682cf3881a",
		      "sku" => "32TSO-57NYH",
		      "price" => 76.46
		   ],
		   [
			  "id" => "a5313e09-8127-4b5d-81c4-ee966639e77b",
		      "sku" => "ZLFAX-MHMDO",
		      "price" => 60.81
		   ],
		   [
			  "id" => "0c649683-dc82-40f7-829d-2e9a87600b13",
		      "sku" => "EHO0M-NPJQM",
		      "price" => 53.06
		   ],
		   [
			  "id" => "a37d636e-f081-41ac-9ed9-024198949438",
		      "sku" => "KO0Z3-QPKGB",
		      "price" => 96.55
		   ],
		   [
			  "id" => "4a8753c8-47d6-44ab-a1f2-2f1020557e2f",
		      "sku" => "EWDDG-8AZ3A",
		      "price" => 80.38
		   ],
		   [
			  "id" => "55ed38d6-fa3d-4943-8577-ab06dd71641d",
		      "sku" => "GVWCR-M9ON8",
		      "price" => 15.23
		   ],
		   [
			  "id" => "9ef313d2-cc4b-4777-a4cf-1fba84868462",
		      "sku" => "RQMTL-VRQAO",
		      "price" => 67.72
		   ],
		   [
			  "id" => "603c7842-e289-43ca-b761-1543f3a9e450",
		      "sku" => "WFTSQ-XUK3S",
		      "price" => 29.67
		   ],
		   [
			  "id" => "c17e4c19-4832-4db2-ab3f-c691d57f926a",
		      "sku" => "5WJCQ-01YFB",
		      "price" => 68.56
		   ],
		   [
			  "id" => "15cdc6b9-5889-4057-9874-b6370032ed36",
		      "sku" => "2AOPY-I9UVP",
		      "price" => 32.22
		   ],
		   [
			  "id" => "d7307557-4c66-41fa-b8f2-b35f42905fb6",
		      "sku" => "8ZZYS-CCDQL",
		      "price" => 19.65
		   ],
		   [
			  "id" => "27cff874-c8bf-4d5e-90e8-dfa72f567aed",
		      "sku" => "KP0K3-LTVTS",
		      "price" => 17.72
		   ],
		   [
			  "id" => "52a6a776-4eab-4e9b-ba42-05ed721cb5bc",
		      "sku" => "Z5J01-PO6AN",
		      "price" => 16.87
		   ],
		   [
			  "id" => "947e2935-b601-467a-a957-b9bc6ded936b",
		      "sku" => "6QBYK-HMWJ9",
		      "price" => 55.46
		   ],
		   [
			  "id" => "8816a041-8563-4985-b6bc-05b22c04e61e",
		      "sku" => "IXPZK-FPLG5",
		      "price" => 49.14
		   ],
		   [
			  "id" => "1964e2ca-d9e8-4655-80b6-edc692bd8d1f",
		      "sku" => "EMQRV-ATLFB",
		      "price" => 34.58
		   ],
		   [
			  "id" => "bd5be617-b3af-4162-89f6-5873f1ad2684",
		      "sku" => "4J9V7-D3B6R",
		      "price" => 53.29
		   ],
		   [
			  "id" => "7e0f736c-47cd-4ed5-9ff5-dd93a6e49370",
		      "sku" => "OHMWM-DCEHE",
		      "price" => 39.88
		   ],
		   [
			  "id" => "979cdbc9-c81d-4f9a-9414-fee30265c7ae",
		      "sku" => "C0MG8-4GCWZ",
		      "price" => 36.07
		   ],
		   [
			  "id" => "3b2c7808-f7fa-47ff-9e4c-3ccf094f556a",
		      "sku" => "HUIQI-MAEMB",
		      "price" => 67.78
		   ],
		   [
			  "id" => "e5797cfb-a6d7-4dc4-a80e-96e631a30b72",
		      "sku" => "QM7TG-LSHD0",
		      "price" => 77.4
		   ],
		   [
			  "id" => "8211febb-d1cc-4531-b4ae-67a65599ef71",
		      "sku" => "3UEAS-MMBJF",
		      "price" => 23.56
		   ],
		   [
			  "id" => "37369938-4d8b-46b2-ac67-700a52353ca3",
		      "sku" => "UDUEE-3QQPX",
		      "price" => 58.46
		   ],
		   [
			  "id" => "1fb8a164-82c1-4283-9468-e0b53d00b758",
		      "sku" => "EAC6R-3AMTX",
		      "price" => 67.97
		   ],
		   [
			  "id" => "b465254a-a93b-459e-9c6b-787557e139b0",
		      "sku" => "2YQYH-VVTXX",
		      "price" => 97.2
		   ],
		   [
			  "id" => "5abd7d49-c102-4b8b-a348-af94398fc6aa",
		      "sku" => "IXSS2-JW04F",
		      "price" => 48.16
		   ],
		   [
			  "id" => "2a9696ba-9110-4851-ba15-d9c3342166e8",
		      "sku" => "1ETZC-CAY2H",
		      "price" => 26.05
		   ],
		   [
			  "id" => "4c90bc44-8c2e-4e11-9a85-afc0ae67bcb0",
		      "sku" => "XOIKF-THLDG",
		      "price" => 55.29
		   ],
		   [
			  "id" => "486a4fc7-8f5f-46ba-b97e-a9c3f8d12e4c",
		      "sku" => "BCV0Q-YFOOG",
		      "price" => 69.37
		   ],
		   [
			  "id" => "e81b4071-56a4-409e-99de-480f05f2fe75",
		      "sku" => "QLMA3-MBK3S",
		      "price" => 19.63
		   ],
		   [
			  "id" => "d9e698ec-cd44-4888-842e-5d6b21241438",
		      "sku" => "QYYEM-QAAPC",
		      "price" => 38.57
		   ],
		   [
			  "id" => "9e30b286-5967-4567-8e92-db58e8c7768d",
		      "sku" => "G4KT9-HT2YB",
		      "price" => 33.6
		   ],
		   [
			  "id" => "7093cdd7-e224-4014-8bc9-4747b1891cc2",
		      "sku" => "SI4W1-OWOXF",
		      "price" => 74.65
		   ],
		   [
			  "id" => "e9611f00-baf7-4ce9-aab9-4e8f36ffc0a4",
		      "sku" => "YT66V-KQO5F",
		      "price" => 61.25
		   ],
		   [
			  "id" => "3a4dc84c-06ce-4753-b38f-88c89a1081f4",
		      "sku" => "QWW6M-MPUDJ",
		      "price" => 35.45
		   ],
		   [
			  "id" => "f9be515f-41a6-4ffc-ae88-291f9e293e2e",
		      "sku" => "6H0YN-VUEDN",
		      "price" => 14.46
		   ],
		   [
			  "id" => "ce08568d-127e-4617-a6da-9c921beaf7bc",
		      "sku" => "6STQ6-FXUKV",
		      "price" => 59.54
		   ],
		   [
			  "id" => "076eafa4-bcae-4f8c-939c-b83d1d8241a4",
		      "sku" => "RMLUH-FXMNV",
		      "price" => 16.69
		   ],
		   [
			  "id" => "ad111f66-7248-41af-9952-4f05c57a15a3",
		      "sku" => "EM1JF-BHVQV",
		      "price" => 65.27
		   ],
		   [
			  "id" => "9a51bdf7-fe10-4bec-a7f8-8123172e6e9b",
		      "sku" => "XU0XP-5KZQE",
		      "price" => 30.23
		   ],
		   [
			  "id" => "9e078a0c-2a39-4c5a-825f-44cebab5224c",
		      "sku" => "IIXJ2-YDCXW",
		      "price" => 28.54
		   ],
		   [
			  "id" => "e8f4371d-7a06-4fb2-b5d1-1acaceb28212",
		      "sku" => "YBBGK-PLV9K",
		      "price" => 77.68
		   ],
		   [
			  "id" => "abac844a-8ce2-43aa-94ef-32ca484e24d8",
		      "sku" => "W3JAJ-YKUTL",
		      "price" => 32.76
		   ],
		   [
			  "id" => "5d020a71-064b-4b2d-9270-d4ec0672f478",
		      "sku" => "YNEIL-HNGLY",
		      "price" => 85.83
		   ],
		   [
			  "id" => "cb8ccf42-1202-408e-835e-89195ebdf060",
		      "sku" => "NT7FR-UXNQY",
		      "price" => 84.41
		   ],
		   [
			  "id" => "4690b0ab-54d8-47dd-aeac-f552b019b002",
		      "sku" => "Y5IYB-VD1PR",
		      "price" => 41.95
		   ]
		]);
    }
    
    public function down()
    {
        $collection = $this
            ->getDatabase('local')
            ->getCollection('Product');

        $collection->delete();
    }
}
