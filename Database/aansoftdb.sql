-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2018 at 05:12 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aansoftdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `acctypetbl`
--

CREATE TABLE `acctypetbl` (
  `AccId` int(50) NOT NULL,
  `AccTitle` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acctypetbl`
--

INSERT INTO `acctypetbl` (`AccId`, `AccTitle`) VALUES
(1, 'Asset'),
(2, 'Liability'),
(3, 'Income'),
(4, 'Expenses');

-- --------------------------------------------------------

--
-- Table structure for table `assettbl`
--

CREATE TABLE `assettbl` (
  `AssId` int(50) NOT NULL,
  `AssTitle` varchar(250) NOT NULL,
  `AssAddress` varchar(250) NOT NULL,
  `AssContact` varchar(250) NOT NULL,
  `AssOpenBal` int(50) NOT NULL,
  `AssAccType` int(50) NOT NULL,
  `AssSort` int(50) NOT NULL DEFAULT '1',
  `AssSortName` varchar(250) NOT NULL DEFAULT '1. Asset'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assettbl`
--

INSERT INTO `assettbl` (`AssId`, `AssTitle`, `AssAddress`, `AssContact`, `AssOpenBal`, `AssAccType`, `AssSort`, `AssSortName`) VALUES
(10001, 'Cash in Hand', '', '', 234423, 0, 1, '1. Asset'),
(10002, 'ABL Bankk', 'Vehari', '', 237680, 0, 1, '1. Asset'),
(10003, 'Commity Tufail', 'Vehari', '', 45700, 0, 1, '1. Asset'),
(10004, 'Sheikh Mazhar Commity', 'Vehari', '', 30000, 0, 1, '1. Asset'),
(10005, 'Commity Farhan Nazir', 'Vehari', '', -56000, 0, 1, '1. Asset'),
(10006, 'Cash Sale', '', '', 59294, 0, 1, '1. Asset'),
(10007, 'Ray Kaleem Ullah', 'Danewal', '', 25395, 0, 1, '1. Asset');

-- --------------------------------------------------------

--
-- Table structure for table `cashpaidtbl`
--

CREATE TABLE `cashpaidtbl` (
  `cashid` int(11) NOT NULL,
  `cashdate` date NOT NULL,
  `payercode` int(50) NOT NULL,
  `payername` varchar(250) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  `amountpaid` int(50) NOT NULL,
  `uname` varchar(250) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cashinhand` int(50) NOT NULL DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cashpaidtbl`
--

INSERT INTO `cashpaidtbl` (`cashid`, `cashdate`, `payercode`, `payername`, `remarks`, `amountpaid`, `uname`, `timestamp`, `cashinhand`) VALUES
(1, '2018-09-11', 5, 'Naeem', 'No Remarks', 1800, 'name', '2018-09-11 17:11:59', 5),
(2, '2018-09-11', 2, 'Amjad hanif', 'yes i have', 600, 'amj', '2018-09-11 17:11:59', 5);

-- --------------------------------------------------------

--
-- Table structure for table `cashreceivetbl`
--

CREATE TABLE `cashreceivetbl` (
  `cashrid` int(50) NOT NULL,
  `cashrdate` date NOT NULL,
  `receivercode` int(50) NOT NULL,
  `receivername` varchar(250) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  `receiveamount` int(50) NOT NULL,
  `uname` varchar(250) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cashinhandr` int(50) NOT NULL DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cashreceivetbl`
--

INSERT INTO `cashreceivetbl` (`cashrid`, `cashrdate`, `receivercode`, `receivername`, `remarks`, `receiveamount`, `uname`, `timestamp`, `cashinhandr`) VALUES
(1, '2018-09-11', 3, 'Asad', 'ok', 1200, 'abc', '2018-09-11 17:13:52', 5),
(2, '2018-09-11', 1, 'Rehman', 'wao', 800, 'asd', '2018-09-11 17:13:52', 5);

-- --------------------------------------------------------

--
-- Table structure for table `companytbl`
--

CREATE TABLE `companytbl` (
  `cid` int(11) NOT NULL,
  `cmpname` varchar(250) NOT NULL,
  `cmpaddr` varchar(250) NOT NULL,
  `cmpcontact1` varchar(250) NOT NULL,
  `cmpcontact2` varchar(250) NOT NULL,
  `cmpemail` varchar(250) NOT NULL,
  `cmpweb` varchar(250) NOT NULL,
  `cmplogo` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companytbl`
--

INSERT INTO `companytbl` (`cid`, `cmpname`, `cmpaddr`, `cmpcontact1`, `cmpcontact2`, `cmpemail`, `cmpweb`, `cmplogo`) VALUES
(1, 'aanSoft', 'Vehari', '03335575561', '', '', '', 0x89504e470d0a1a0a0000000d49484452000000c20000010408030000004df91b1e000001a1504c5445ffffff1d1d1dff5b1f3f8ec0f9e43d91ca2d5d821bec23273576a00000005fbf001a1a1a191919151515131313ff51000e0e0e090909f9f9f98ec923358abe8cc81b537b003188bdd7d7d7ff540debebebd0d0d0236e9bf2f2f24444442d2d2deb0000e5e5e5f9e32fb6b6b6a2a2a25c5c5c323232525252b4b4b4656565c4c4c49a9a9a2323237171717979798787878c8c8c3d3d3dffa186fbec80f3f9e9344220fff4f08cc22dbddf8ae5f2d0ffe8dfffaf9887c600ff896bcae5a2f9fcf4d0dac0add76bfae753bfd7e863a1cab2d977ffc6b7a6d45bd8e7f1a5c7dfff6834f8b9bad5eab6fef9d7ff4400569ac6f6aaab588baeffd9ceeef7dffdf7ccc2e1967fa4bf6c8d35dfefc7ed3336b3cada91b1c888a25f7b984b4982a8ff7c55bdcba7a1b582e4eadbfad0d02c341fff774cff9879ffbba9fcf1a488b6d69dd049fcf2adfae96b8cd051d2e9b1f48785af7e7ff16567b1c298d9a2a2907b78283a3aef4548005f91ed3032f79293f45d5ff9767883b826a0d77578c73897d468150c1a29212e65a82271875e81b3565e7c4497b977fbee8a3c6d00ffa98f4fba003342e7de0000200049444154789ced5d095b1b479a968c71284bdd3a01a1d33248420201225a451287c0022131d80c60012330576208246676bc3bc924b376b2b33b331b7ef57e55d5477577b50e2c0cecf23e4f88915aad7afbbbbf3ab0581ef080073ce0010f78c0031ef080073ce001ffcfe0f6bbddb73d864f40602c118f8c472299d898efb6c7722d04c2088976bbcd6e17448432a3b73d9ece3189042b030125ee9b422591550757e67e71183130000eb1db1e5527f0731858ad2875dbe3ea00932e1e05f11e89c16db7f1285851e8b647d636525c3dba579a346646e1fe048798684261ecb647d636e2763e05d7d46d8fac5db8232614ee8f14fce37c87644523866bddd572a3d62897abb730ce26885acd28e83c52b5b63e08f07af1cfa5da1da2614e21c05e565e1ff4f6a8001e3de7778585b92231a1adba3ed8638077f0fcf686cd226442c11e51af39e710c0182c7f8e1196b22f5fbffeeef5eb97d992c915264ed539215fe05e3261d0d3b37ed3c3cfbefef6fb178f9f533c7ef1e5772f795765042e05342cbd1f5af79a31b86131bcfcee7b18fd6316cf9f7fffda78a14974467efab6bb0903c08de582253cfec71c3c7f6120c1cfb585b8f4f652530683b59b21f0f29ffcf15312df67b5578ff22b1e29b0d54ced8062e946087cffdc9c00e6f0582b087eb28da2e4cd6a53196031745f93b25f361d3f25f12dfb89a893a74719fa667343e8b909837edd5c025c0ebcf02ce9512b3582f8d66d63684304460e3c97444373a81581ee53f8be4d06c081b1074e0fc69926eff0a2b2d77b9314da9501e1a086398e3dd3142fc43184a5aa36567b1bdd64f0ba030600e573210305214cde383752182cd7426536e7ebae39bfe888c1f32f950f1ab2245af9bb8d0cbce7e5c19eaabbc650e866c6fdb2332130e630a58bcff60831e61a8742f97c70bdba5eadaa2f75b3f7daa11e3d7efc42fea4de18a4aad96808200577ad7a3e78de90d979bb1a9d3ba6f0fc3be9936e2d059b95647865a33bf22e41c5592b2f55d79557baea903a5524805c428435f9369a242f72f2bb754bb967b0a75c55dfea7270eecc9c1f33014e13196c36220437b7d4ac596a3d83ec3bdd4d91beeb580c2f2431f89051080d0305efd2f9fae07a88b5f2ee9a82e53a6290ad816987d9c769ad63d023ef79b5ecae0d56596a5d2f173ab786efa54f32658fe48e3891b9ea1dec092d69a879bbde87e95895e4344375abf63875f46503052fa41683354deeda753d027cdb6978fb27fd9cdb2627dc724bde905c78079742e5f3aae6b51b293b3be5201bf48454f7c8a58e21ae416a515b8790a0657623fdbc0e039c9c65c89a243752f505a777a97a5e0e699b9237a247182f9b94fee69a14a2136e6242ba8bdea50e42723478ae0bd837d6452a755236289a94269a2415fd4653183caf7921c1d3bd7a73d3ebdfb555404b62907cd23052a31a605d3bd61eac42e5909698f726bbc21d08424e324290ddd905f906551d839e6a68c97baeb3e5ee07050d5ebe6897841cdd4093701b558a0a5aa5f77a07cfdd657d83fec67bc2dfb54b42ba7e1839f17c3f35066df3c5bb04416d5053acf574bb6ae6e3dbb67c936c0cfe7162cb746a47abf438a82d0dd696ca9a3acefb39d6ca64db21a1a47a49921cd1b8a0b166f0464bb550b5ecfd7cc6ac21d1529de4c86009e0d4df4728b8d73563add6400a4b3a03ef6adddf14a59636f182bd7c94accbd3f8ffc10654098d90c1cd7e2e0618af5f348d13cfd919ac2962ce9a9a60dd0dd5a657cf60f03318338b975f3621f19c9dbe4a904252935eac7b1b3a5f44f0d917be617d3261a1d83306223f19cf03a95c0d320b7d4fe9730b81e2e53f9f7359b05d6e37a5c0fa54482c2ce783fac4f5b35a028bd75fea67101f6b3a93161fa5c0641278bdc29231ebbbcd897f0e0bc625a5240aaa21544187d6abfad4fb96a7fd4bafbf7da1a1f15c7d6f845060c242f57c09723e7d4c58bf038b58b7b030381426080535062c95071be755bd1a793fcbba855cb152399b999e9e9e99a96c16739c2bd4ece3b93a8b9ba01498e7bd54edd117cc3735d7cc8c7e7366eeed2307600803ff6375eeb78a91864c82090c113d05a899f50eb5fd8a39144d8d4c4d4d8d0cfba2ad2f5650acccadc2d81fe9004c1e1d9e15990bfd2a0966decd89b096b3f985d76b2813681b75b4853db853e93842c8e572c14f6b3839d2d69682dcd9e123e3f0151a8e477315e55adf644026a1c6b6a88bacbcd03b20ad1a117fea0fa7f02a9b2dd3f5352319e454bb9c36c1895ce1317f0b029ba74dc62fb3583d932f0f25128444e95b954200919aa11905dab518452396c22f1f9f3e7dfaf15dbe60a4e14b20e3fa1a010993cd44979b6b357e0ac72385c4144a121d2d29b69042c8d79c02316577124d58f24f157ccc6fd1cf9724322388bfbac68604cd6a39ad081eb54580905895d50946ac5dc8092fa49a522031cd1741314bfd4aa5f0f4eae9c7e5cbb5b5fcd3acf46c4cd6ca59ad766599931e1547bb04305ecd49ee29604771d6ca465b50185c228fd89571973e3ed5e10ab046ee62b6825a12045f0e95579d30c00e4ad2a628380d6639ea18225d61330a98012891105fa8bfd333c0b82437196ec600e460e54d0c752603028724087fd885628a8d4dba88669950185c725b7ce32ebbf5bf3fd6e7af0c04defd9d08346aae451488b3907ab373062088d54d99832b2e479e0927597cc15f848419a490601bffdb0750f95ff41ceaa924b94782b736482386b8410cb96b102082a0ca140a3bc571493fd34ed217e62e80f102831178c2b6f87fa5a230880f1a021fd72c611f35a7160cf46b7831e6daf6457a0ed39443c62908298902599dcaa3807b2e1344476cbf22148f4d8cfc8321305fb28cd2c533add4c8ca590c7e0d435038cc112bf04744bb6b982a92cd16623355d69b86e4ad6336171a4f8fa5a259c9a87fb92ce105f83eea105a3230ee2a58e58cad5db90c1d12a3f68f0bd45f4fb8ac4e9fae8d24338886e994a21d592703b203c81676b7682c18a68b67c4d642b0ba26b50cce8c42189a99699bc35bc2c1876c761c11a6109de6d14fd862067162a63634cecfefc22448721daa3e54eb3746bce5e847b17df3903804103cdd005e05400283aec6c10cac641c2eb30d3e3e92995812c6c402a5a2312d09dd3d8a1c4b582d62e51a6a2f671a5a250f151c895df0a7105daaadeb0ad7c0d9e3ac4d4013c6c1534c9209f7a871d5ae101e4dfa7d1a123a8ff49b719c43a73850384e2b87ed71784b6e043a24c6034eba204cd39b87dc348a70deec8a98a7fce3c41438c68c861390fe467dea1a46dbb836e7e60cd351015e8eb3e229d62728df5a723824774a23ab2b396eb547dc9a19126f4fd5e217046c0569f34cd987485c0b1b336c1448a0d1181a1d53042424341fcdf1fc51f1104a4ecb9063baf2a858dc3c5b85da938ed544b51ca7f856eeb0687526ecc425a9e1d9bb5eb58422227644c6ad3d2a46888a458dfb144594f4a7dcc819505d95ce9a8b9c11ad6e6e9ecdade65e39ce66ce2a90940e1d6e568871fc5639e5bb5bc70c799256bb1d286097a4c436ef5288a60c82ade95ec3241997d11f3993beb1487c2a1a48ab69874bab8e45de901caba76743c5d3b9dc5b90c7f4e6aa7b6e1a5fe7284e9f15795283b748be348cece171eab597d4908c35cc2a8e37af7c5d44461386f4484cc5a2890c4a265472d2eacbe6147032fd68b5b279e8281ebeda3c3d3b73388a6fb1a37af4ead42c25249d8149648bd3d973ea9248bf089ba8d082819f26e909bd29803b42a9b0cf2e326fe81592a748f2930583982b56dcab9553c76a4e7254ab39dc935198aa9cdf12530d63a58ff8a93d7bc90a8b14c293b906065b9a7a394528440dbb82d05828358a7c36e6759ba0cb53b9e6ac6075fad1691178cc6d420cc78e6a686ed3512956c0b0c1b287369908484dda8793341ca4aa648e105e09c505fa8a0e790d05a8f686497cd4c29e419161bf7f92d52f7d76014eb5198547674570ac4387956978f043b9b70eac56955795e9b7c5e28cce3dd1d41b2fd22396b92eb5ec922eeeaee1ec958602adf60c6bbf5d23a10914096b2c04191a31d34dc317eee6c9ce7435b7395d29beca15378b333367af72878767a4e3a75c5b9454891843ad2c3d5e7e95f54e4b61c2892918ac5974c57cfeb426b97019e37b07159be3f0b753c7506ee8d1f4dba1cdcad05065c651cc55a6571d4384068dd2f81c00556f4250e93a8d1be84befaeb4149222a660d8441043084dfa34cba9395bd99b1b83412690c56e4ecf1d565ecd6cbecaad82529de61c9bd3bf518a243a8036a8ea3a8978d57a01f72b34146222f819b72e36db9cbe681a4d4eb079134fa296df3aac781c73338720844a65c802ae1622f8506e7a26476ee220aa941095e2368a388690fd40aa660d85840063f347b40e499840315fd4c7be6ab3f37294266ed54c16f0dfdc29c43c477115ec1b9c94c342285055f22165571e3c40575afb755b72c9ac79352182e4f47b82902f3a81e2368d1af153f5e6066dce631544503ccbad8249cc49293b55a549249d1f017661b3b16df5d2e53bb96ff14e3386980839ba4feb9004278a05a21a1317b5099e82eb3630c047cdad4e17b13655e42a8fa852286247721dcca664d9fc53b5f1f2413386a4e84cead6df0bc94917b85a3626d838f185e2faf57f6513c2c62a644872e947f3ee51445ddfb85ddac840245067083cbd9ad70c21ed04c169db2f420244104eb181b9c94efc6b7761865657751f75908e7142c40128c00a61f7a3a6f575b5a519c1940b8a004dbd6317c3f644c0c7ba23316c5e6fb8af2b051ef00d69c77b0cd9c6654bd0f4b10d0e093c31e49fec5e14db78201002ffcc5a82493f988257405f13d4a2932ec10db27026a52f30741f7fd10e6014d9339aedae686402f902532d43828acd0e3bdb4d30843b1a01dcef463639267cd03390baf00a52c81e77b3ce078dc627464436ef135b1db8b439745d7b305020296b1a45808254a773bad8baa9291fbe9629ccace08c422329c61d997b2305e01abbc5013bd628946148aaafb20602571f74dfee463681a5805263ae38e8525bde48c54cfb5355cd29cce1bb255d119bb4fbff8381c2d3acfecb41e9a20c05f0a8fe49c45882d324a8e9909b6e39e3d91e072c065cfcd027576a2d047c7e00f2b159b580c27e265adb8556d3b50a0932efdc8ac6908a266280cc9956b90503858fc649dab4130592daae23fbbbe91c2197c5e6f4e1ea2379f1820487832e6780bce8ede1e11ce0f4f4147e1e1ebec54d26bdec8818c09bd026fa9ac198778d5f0b65dbb0b6b6714eaa292a32149b2d69e48a740909c16f50a35536378b805c2ee7365c0ad79e1e3e6279503184059184854b1d055d6e4101c5f3889682d5a93010339c4f748e50f3c32173c59939b5d947c4300c8e126748bb5a0a5775dee753c83566ec2249fed4d5c9221203a281e1c95826138f47e2f14c26919e1a0d98de2f5799933b976406cb6923e97db6ce1278bac6fdac1f39a7cc287cc29963a1543a2222e41205c14e20884e0839e278622c65e2207233b48b4c42f418a2f9bd1a9bafae3e98ad1a41ce09130a2d128b2648251172f28e93b3d98117ca981dd759c12448a604150f0ea95b74621ff0b16e88070a22cef42497429b11c100f78860b2904386003426525cfb98c1ae0bbf931471ddf04bdd52b89c9f5f2b682efafaf77ffae28b67cfbef8f927fa7bc2959ce21e4611b9de265020d0c6ac9dcd895092c72277e87885eb069cbc85b6f4f910c6effe00a3a778f63399e982529f2705b315172d10c8b44380c28984498e466dce11bf0a2348e57f31bcfbf50ff2f809fe80fdd7144af0a4d07452c20cee29ce62a666b270a1c4b05114b4d3ed12631f0d2ee8f71a025810166cfb61fdf67bcc20adff701b8886db98bbd6414471fe9233c8727efd9b6ac2ee1097c117cf8ab86e8b8f1928342b354d91b2b55ac4c1059e0ee7c58b8cf0ebdf1553f0253185df19187cf1ec6b1c9e2386ae30a7a7df1ac3c8e418bf96b0b9c409238929975d29b652c4327346065f3cfb1d99a3324c537594dc49186ddf8e79240403091f527ac4013ae7fc2723832f9efd1e531052fa49fe6bc4b4e1660cc4d6460e9298d22aaf3b2c486b3efc56722cc3d71c2148149c29ed248fb1235e6dec6def355d721f70996b911d2563ad38081027902e124dbaa4b3e792d43dfecc6140288c226720c37ebfddaa33e5c6469060db9c817f5c33469b20120f01f91172a1b83f6598cbd30a00728ef49861452f6e8705c8ff49b7bbc81302a130829c3ecd37e8cafdf241b08fa209077641991d216b2c39869c36219c89f8a201e48b710f35a310f1fa1cee4d43113b694e26a8107e32a50039a19f9d22d1f6b0fd1b3201ccc14c97a6187f600f8f05a2a399109a8ca068329546bec951d3b54e20809879169074da9cd8ac693fe60f3c06c4234db8ac21b685a1998f6a0419067d7d2662d0cc36a291401cb2ea687c7814f93381806f3896364c47ca049c13cdbcf70859a134498754e4322014c262dcad86674d4c0b6d6b08f4f51d70039e5b7304a118f321312ca626c468221a191d46289cf1718f8a74bad2cd4b2a70abceb445ea8772c21aa100a10d379d94d8a68969d5031d83be3eae2669a7276c4eff682090991a46319f2f32ee1b0e8cb8e21c0202bcaf97e664323d31968aca0f0a3f1b1445d42dfdd1440a39f87e31a64e30b031ada11fbf9931e822234a8d449033e187a23c6a1323e904e29cca6643194ef8f48f86f1ae83b09cc082828b31ba5487ef5201c4a7a695e7c8362cf60c2230a3a05b1dea1a1bc6838e265ce180d36ae38635114d992461a9181205486047e53b0b52cefc039fc1cf387e4008940e9775327f35406f064d28e8522c2181e7eec474c63662b2f4d586124dac389080644b44789b0579b4b482cffd854fe127dcb1814b426486d9262ad6e5dee031e8ebe3a6c5fa2cd196c40f44b447c622dca4c3e56a710e782a429e7edaedc6e3a2149a382464c3ab8c486c53ab9c90d1909b782443a22b45199b8bc7c08ed2721e71b270f4fe1870b470a2bbe514ce7a5df128ee2b520adc048958730091b96a1c18a46915f7a8c56dc2a06f83fbd0da5829cde850440a650bfb030c9e1c2f68eee91b073f2f581376f9c99a50f881c4669cd441f8b4d1150a81b03bc41f3f98c21e978249e0e2c129b5fa4f8ef1b059c0efc79a5a3f8d579963fda6330d7c0acf7e228d6d7cd394b4cc1542a1bfaa1f7843764e41fec63efe5f81e0ea508c58dbc9be6efc328b6356a146e4f49d8436130a457c7620b9c0076e0cff2f8ea23a0690a1f6f965f7c4cf91dc6607c71b7468b8090189042309b90c241acea7f033992d24497a687c8caa934f2f831aa4da1ba18de001b6662e03f9489716045cc214d1d423530284c49305f5be29ea0fc83974a6f54e42948ecd848b7c6114d1330896b7b761fcdbd58df2819929b4dc40439ea48b1696276f4c08ec28241841488e02eb3897c21f72a0c5cadc28a81eca44cb5a5704830f361ae560b0513d68926b87ccceef9721a2248d650b4f4c180c1cedcbef0ceca816314938608fc3a3808d195b0c75f5d1184231b796018cbcf16375efa01cdc6b98bb548ba5d5de07112524477a6caa4360c9cc2f8a32d19552367b944be12f39ec8fa44558a3e32ec8ca7532d886e7beb75d2d6ff46d34f147440c26277e1315423159d0fba666bc73fcfef8bdfaeec07bf9ced46183267dcdb704ec4ab18686d208af6f631904b10ccad819292f991933fd26be2ad9104a2a559999193c197873b2bff03f276f58a1c81f220525f8240e851fdcf86d320f1188b8c090350cf6f6828d8360b9f1634d49f79a08c1425a39c6f1bb907d4ac9aa4a3b7c06034fde2cbc59d879bf70ac552ce963a40eb08d878c39124e8fa40ec1148820edb654355a14dad8ab068321b79ab03613820567041a41d84484ec6c59efe63318d87f3fb0b073f266c110ad650e64d53b0a1833d5bf5ab04785d81d4a2027ded1a46110dc2b87fa1ae58386faa2a93b5230328e9053140401cf48d913da991c3306c7eff7f777168e17386f49f640828e6bcaadaffeb12d0fe3869f0fb950d2af63d0b751fd71bb1aac55371852ad18000223e944389c484f0d1bca01133b18388237f617de73f38d23f249121bc0adea4a1e5c3387e28290846060257b43b5bee820448c999181b9436d0bffe0cb00dbc10056223ebf05f25c8831d8435a0ad81be1a8618b2022024b55130e8040ad7cb0b7cdbed8ee32063eb84ff9c993f747a0490b473bdc3731488ca36e35a0a99d9ffdd12259bab48759c3e0a0760096bc57dd6ba707d61e8eb87a0212387e0f21c19400385b9c6b906e291afb2bcbe04f16bc2f91d46924e8f80f581934f6423f36ca3fb23db0e0a79d8453e2cae078e1cdf1f18281805c02d15fb05b22ab04c5f44f3a069618b6735a0f851806c1beea5e5f159e7aad7b0cf869c5c0c9f1d1fed11bdd8b60dbef8f7039fa86b2c0e640ecd9fe67758eead99f705244d64cb948a5a9a9f4f73636aa65e0d057ddee1a038e1006de1c810c8ef6f585dbf18292a592ba0e7894a41cc3f56fcf583ba06d5c3ab1cc32086e34fc07dbd53d88d307b23f0d9ad439ed4367cb0358fde139ef1ceb19ec6b9b002590c6fecebe748ab5f35f595f44134b69629961b051db8070d0b7bdc79ac6c6279fa2ac13c2fb81fda385fd9363bd7aa9e9a91ea421ebfc7729b67dad30906a65a6e3b551ddae6e076b1ac56a2ba235c782ee59efec1fed3f39d93164adfa3e8c0a92e989691c18a4e97e5a46d0f934954130580b6e54ab7db5aa2a84e04117ce83d28e1527133b274f8e9fe861ce80ae04b6fdf98fb212b9e9f66dda3d6564d0000daa06cb07aa330df675e55431edd33e82a46861df5838346120b5da10eecee35fa319329540671dd4e80535321436d586dacd0ef6ed75e534a81365b4034f767616debc3f3e3a36068305e5fa507478646c726a645469d14ba5390afc80d36bcba8535465b0c7e6a17b0dd020c50c82077b5d3a0c5d360530e2270b3b30fe2363ceca149a2331c8772922e9613a069f64bb39b0647f9a9e62405b6a9aee3b78a30339d70b8273edda795c52723170740c8387da8653ff4b29a98450d4373a9910904b70a208a99868ab8dcc418f8e1325a23b6fddfaee7b554aad831019ba357e86c23e7879a88f0de3d73390e04f4d4490d38eac636e29308849dab6c7ffb4e2c42864e8be1f907af960bbdcdd03d114455a381ee066d5a6f120349cc624323e9aabda3313d262331426e728197bd7e08ab6f7aa5d3fd04d31e781136e566d1ed10051d07cd139221d2021f50ce906f43d5dbf083ffd46f7874fa03cf8373c024dbda905f72405ed122162c8e079822afa36b6f76e6af404e6ed2f6c2166eb3615f8ed9af60e9e93b294f7b6f7f6f61a18e5eae7f8fbbde604b886ac87a6f52f5a6fe5afb99ff0fba80303fbe62b4f59309348c2f8a715c0d7468933a130f0e4b88515a850d690dbfff39316607f124e8e77d45617ae64de1cb527010279fac2f6eb2f5bd9f9fa5a071fed264a2747c7fb6f76006ff68f8fda160081bc42040d6f3d7df7f4eaea69bea513b83194303aff98b4a45c4858b6e822f4ab8fb724886b43da8d0d0141d991c1d90e73a7217924908242e1ea5deb8fdd21c86b5c8430b3a944bfc5f06e438e0b62cc9265f6c5dcf6b03a81bce717cfcdb6d8987457214fa7e269c1bc2a868fb73daef6a1fc3d379ca2b25b3e393bdcee28d44577b8d864b66f1bb767dc552873dab477c76c7fde6af5d1bb02e5981169e9a3cae1be8841fd3b9ff2528b35e530837b121bd4032e94fd51a5cb77d29912f7c3a2d57309d8e5f0d9cb0feff0aebdfc7dc8f7d4e55abaf3994abbf57a3d7f0fe4c01c5783eec089ffd7015338a3db1ecb35a19ece69135a5f7d17e15757ac4bfb7aee1d98557ffa8307ef0b92aa359b1dd174c7e167769f88c9d6d7df41b0abc19da687dade69b03bbd0ca74bdf0bf834471cb57336cd9dc3a486c275f690df36fcec7165f79302bb67f17a1b986f1b7e41b38fe613ce15b9354c68f7b65eef44885b857e7b0dbabde9916b221411e96132761b85f144dabb8d5229f6cd37ff22e19b6fbe191f1fbf17154f696babb0369f5f5e5c5cb9f8ea3fbefaaa97e22bc07f0056169797eb97bb5be67fd7e9f650da2aeccee761dcbdfd000f462f0ff80d7c41efc5caf2fcee5d61922d5ce6e9d04d86cd07a182995c166eb385b1b55b5ff9aab7c3b153f4334c7a2f16e7397f6aeba6512acc2ff67aae3378828b35850421028fe122ff19a7724bbbf50ba2d0d747ffa5a53eabbb0196477ef7334803863ffb49a39750b26457fa0daf7afa672fe66fb2dd9dbd5cfcb487afa21f4f5269b549796bb6f7663a7ca542971ebf040fb9699e6f4c9efedee52eab54a990bfc0aadb3d06540c164b816ad3c5c5c54db228ede62ff0e3f7f45fd4f55ff409f048b7bfa40fe6e2620568689e117c61be1b765190c7dfbb5cd85aeca2183c2bd23174d965c92220ce2d82a766bfc3d3bf72f969ae766b9e8c1fa2d7ca65a934dfeba1aeaf4b1cfae5e530850be99e9ede957c7e79c5c3380df2ecae4d6077d1836fed99edad833ce7b1fbf0cc2e17d6bac5a1b7ff429ea79a57060de9537e6df732cff80e50a8b5eb5845b6de4b0530bb8c3d9c44004fc9ec768d02dc7d515293ecfc62ffac2c0bcf05b6643602f5f73639bc918fc2623f15c005fe5b6a8a04c86d8841406e33ebb996716bcdc9e3595e93f3a3c23c8c990e1a529745fce477f3bd12b1fefee54e4cfb52b2600f750897988ea79f12d85ae9c739e64a7d379b5546d32fa10d6bbf58d4252770b7d95ec8bc4b120dd91270a0c6a68ced91b0f0cc2eb649a2344f2d4056541242814d892647f09c56d6c8adb614021797bb05c8fd4ba5c2e54a6b0e97d92d70d3da1c91f0807c957ce3d65a7e85647e9805fe2ad9ab786657dab0ec6c9e3ef25ec923671767f16ff592656d19640af795e459c8cfca0cf2943a5cd096b70295c08f1c78ac7c65e0b122d180b7e79721525cd0bfed69292cf7f6b745020878f0235f913d40095b14fe6d0d8c0dbee2825855617ed9a378108fe4554af5b6cddc8355877c05ae382e3cfd1ecd5b79ee28b3f317944433752204700c66ae29aced92df16498145fe595a9c5595b97f45bdf8b2cdc0e7a1aaee59a651abb4b5b6bcd2cb88a3bf97ef424b979444ffb2998bc56e07a221df0597d432b7b0bc4c8a64e27235776bcf435de4977ba9bb989d5532882ca855affc643c664b404b754274d62c91ad83a6b41d084b24739272b5ec4a1dcc792bcfd5197870b3dada74717e772d0f71b89ecfd7e7994518d9427df9a21f1bdc6cafd982b1ad45483725ebe360a5c3b504a52d99f0ee2cbeb15e8f3cd4cb9440531e299d800000007a49444154eaf08c1522a04360b530debaf18195c05dad150a5be62301c39ebd89c527057dde8f239fb6a82f65772feba0f4b3b33486acec5ab26bf3d7c9e1aeb3d6b70d6c5df4eb876f3680c2da7c9d58d3f5b3b71bc225680a6e74cdf62f5ede9bc55e7a14e6f3cb79d3a7ff80073ce0010f78c003feefe37f0164e27daa6d024fb90000000049454e44ae426082);

-- --------------------------------------------------------

--
-- Table structure for table `customertbl`
--

CREATE TABLE `customertbl` (
  `CusId` int(50) NOT NULL,
  `CusName` varchar(250) NOT NULL,
  `CusAddress` varchar(250) NOT NULL,
  `CusContact` varchar(250) NOT NULL,
  `CusCreditLimit` int(50) DEFAULT NULL,
  `CusOpenBal` int(50) NOT NULL,
  `CusAreaName` varchar(250) NOT NULL,
  `CusAccType` int(50) NOT NULL DEFAULT '1',
  `CusSort` int(50) NOT NULL DEFAULT '2',
  `CusSortName` varchar(250) NOT NULL DEFAULT '1. Asset'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customertbl`
--

INSERT INTO `customertbl` (`CusId`, `CusName`, `CusAddress`, `CusContact`, `CusCreditLimit`, `CusOpenBal`, `CusAreaName`, `CusAccType`, `CusSort`, `CusSortName`) VALUES
(40001, 'Cash Sale', '', '', 0, 59294, 'Vehari123', 1, 2, '1. Asset'),
(40002, 'Ray Kaleem Ullah', 'Danewal', '', 0, 25395, 'Vehari123', 1, 2, '1. Asset'),
(40003, 'Nabeel Akbar Bandesha', 'Danewal', '', 0, 8410, 'Vehari123', 1, 2, '1. Asset'),
(40004, 'Tanveer Ahmad', 'Danewal', '', 0, -39525, 'Vehari123', 1, 2, '1. Asset'),
(40005, 'Rana Asif Traders', 'Laha Market Vehari', '', 0, 39359, 'Vehari123', 1, 2, '1. Asset');

-- --------------------------------------------------------

--
-- Table structure for table `exptbl`
--

CREATE TABLE `exptbl` (
  `ExpId` int(50) NOT NULL,
  `ExpTitle` varchar(250) NOT NULL,
  `ExpOpenBal` int(50) NOT NULL,
  `ExpSort` int(50) NOT NULL DEFAULT '1',
  `ExpSortName` varchar(250) NOT NULL DEFAULT '3. Expenses',
  `ExpAddress` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exptbl`
--

INSERT INTO `exptbl` (`ExpId`, `ExpTitle`, `ExpOpenBal`, `ExpSort`, `ExpSortName`, `ExpAddress`) VALUES
(50001, 'Discount on Sale', 150, 1, '3. Expenses', ''),
(50002, 'Entertainment', 0, 1, '3. Expenses', ''),
(50003, 'Electricity Bill Shop', 0, 1, '3. Expenses', ''),
(50004, 'Mobile Expenses', 0, 1, '3. Expenses', '');

-- --------------------------------------------------------

--
-- Table structure for table `gttbl`
--

CREATE TABLE `gttbl` (
  `gtid` int(50) NOT NULL,
  `gtdate` date NOT NULL,
  `drcode` int(50) NOT NULL,
  `drname` varchar(250) NOT NULL,
  `drremarks` varchar(250) NOT NULL,
  `crcode` int(50) NOT NULL,
  `crname` varchar(250) NOT NULL,
  `crremarks` varchar(250) NOT NULL,
  `cramount` int(50) NOT NULL,
  `dramount` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gttbl`
--

INSERT INTO `gttbl` (`gtid`, `gtdate`, `drcode`, `drname`, `drremarks`, `crcode`, `crname`, `crremarks`, `cramount`, `dramount`) VALUES
(1, '2018-09-11', 1, 'computer', 'no remarks', 1, 'wao', 'wao', 600, 400),
(2, '2018-09-11', 4, 'ghs', 'sdf', 1, 'safd', 'asdf', 400, 800);

-- --------------------------------------------------------

--
-- Table structure for table `liabtbl`
--

CREATE TABLE `liabtbl` (
  `LiabId` int(50) NOT NULL,
  `LiabTitle` varchar(250) NOT NULL,
  `LiabAddress` varchar(250) NOT NULL,
  `LiabContact` varchar(250) NOT NULL,
  `LiabOpenBal` int(50) NOT NULL,
  `LiabSort` int(50) NOT NULL DEFAULT '2',
  `LiabType` int(50) NOT NULL DEFAULT '1',
  `LiabSortName` varchar(250) NOT NULL DEFAULT '2. Liabilities'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `liabtbl`
--

INSERT INTO `liabtbl` (`LiabId`, `LiabTitle`, `LiabAddress`, `LiabContact`, `LiabOpenBal`, `LiabSort`, `LiabType`, `LiabSortName`) VALUES
(30001, 'Dumy1', 'Vehari', '', -1000, 2, 1, '2. Liabilities'),
(30002, 'Dumy 2', 'Multan', '', 25000, 2, 1, '2. Liabilities'),
(30003, 'Dumy 3', 'Tibba', '', -21000, 2, 1, '2. Liabilities');

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorderdetailtbl`
--

CREATE TABLE `purchaseorderdetailtbl` (
  `PurAutoId` int(11) NOT NULL,
  `PurOrderId` int(50) NOT NULL,
  `PurDate` date NOT NULL,
  `PurSupCode` int(50) NOT NULL,
  `PurSupCodeName` varchar(250) NOT NULL,
  `PurSupBal` int(50) NOT NULL,
  `PurItemCode` int(50) NOT NULL,
  `PurItemName` varchar(250) NOT NULL,
  `PurWHCode` int(50) NOT NULL,
  `PurWHName` varchar(250) NOT NULL,
  `PurQty` int(50) NOT NULL,
  `PurStockQty` int(50) NOT NULL,
  `PurGrossRate` int(50) NOT NULL,
  `PurGrossAmount` int(50) NOT NULL,
  `PurDiscInPercent` int(50) NOT NULL,
  `PurDiscValueInRate` int(50) NOT NULL,
  `PurDiscRate` int(50) NOT NULL,
  `PurRate` int(50) NOT NULL,
  `PurAmount` int(50) NOT NULL,
  `DisplayID` int(50) NOT NULL,
  `PurRemarks` varchar(250) NOT NULL,
  `PurTransType` varchar(250) NOT NULL DEFAULT 'PT',
  `PurSaleQty` int(50) NOT NULL DEFAULT '12'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchaseorderdetailtbl`
--

INSERT INTO `purchaseorderdetailtbl` (`PurAutoId`, `PurOrderId`, `PurDate`, `PurSupCode`, `PurSupCodeName`, `PurSupBal`, `PurItemCode`, `PurItemName`, `PurWHCode`, `PurWHName`, `PurQty`, `PurStockQty`, `PurGrossRate`, `PurGrossAmount`, `PurDiscInPercent`, `PurDiscValueInRate`, `PurDiscRate`, `PurRate`, `PurAmount`, `DisplayID`, `PurRemarks`, `PurTransType`, `PurSaleQty`) VALUES
(1, 1, '2018-09-12', 1, 'Naeem AHmed', 0, 1, 'Laptop', 1, 'Warehouse', 7, 89, 78, 67, 89, 7, 78, 0, 98, 2, 'No Remarks', 'PT', 90),
(2, 2, '0000-00-00', 4, 'Amjad Hanif', 124106, 16, 'Nadeem', 1, 'Warehouse 2', 3, 3, 3, 3, 3, 3, 3, 0, 3, 3, '3', 'PT', 3),
(3, 3, '0000-00-00', 5, 'Naeem Ahmed', 11898, 14, 'samsung', 1, 'Warehouse 2', 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, '1', 'PT', 1),
(4, 3, '0000-00-00', 4, 'Amjad Hanif', 124106, 17, 'Chair', 1, 'Warehouse 2', 2, 2, 2, 2, 2, 2, 2, 0, 2, 2, '2', 'PT', 2),
(5, 4, '0000-00-00', 2, 'Dummy 2', 13898, 14, 'samsung', 1, 'Warehouse 2', 1, 2, 2, 2, 2, 2, 2, 0, 2, 2, '2', 'PT', 2),
(6, 5, '0000-00-00', 5, 'Naeem Ahmed', 11898, 16, 'Nadeem', 1, 'Warehouse 2', 8, 8, 8, 8, 8, 8, 8, 0, 8, 8, '8', 'PT', 8),
(7, 6, '0000-00-00', 4, 'Amjad Hanif', 124106, 16, 'Nadeem', 1, 'Warehouse 2', 3, 3, 3, 3, 3, 3, 3, 0, 3, 3, '3', 'PT', 3),
(8, 7, '0000-00-00', 4, 'Amjad Hanif', 124106, 17, 'Chair', 3, 'Shop Two', 1, 4, 4, 4, 4, 4, 4, 0, 4, 4, '4', 'PT', 4),
(9, 8, '0000-00-00', 4, 'Amjad Hanif', 124106, 16, 'Nadeem', 1, 'Warehouse 2', 2, 2, 2, 2, 2, 2, 2, 0, 2, 2, '2', 'PT', 2),
(10, 9, '0000-00-00', 4, 'Amjad Hanif', 124106, 14, 'samsung', 3, 'Shop Two', 5, 5, 5, 5, 5, 5, 5, 0, 5, 5, '45000', 'PT', 5),
(11, 10, '0000-00-00', 4, 'Amjad Hanif', 124106, 14, 'samsung', 1, 'Warehouse 2', 2, 2, 2, 2, 2, 2, 2, 0, 2, 2, '2', 'PT', 2),
(12, 11, '0000-00-00', 2, 'Dummy 2', 13898, 17, 'Chair', 1, 'Warehouse 2', 3, 3, 3, 3, 3, 3, 3, 0, 3, 3, '3', 'PT', 3),
(13, 12, '0000-00-00', 5, 'Naeem Ahmed', 11898, 17, 'Chair', 3, 'Shop Two', 4, 4, 4, 4, 4, 4, 4, 0, 4, 4, '4', 'PT', 4),
(14, 13, '0000-00-00', 4, 'Amjad Hanif', 124106, 21, 'Botle', 1, 'Warehouse 2', 3, 3, 3, 3, 3, 3, 3, 0, 3, 3, '3', 'PT', 3),
(15, 14, '0000-00-00', 4, 'Amjad Hanif', 124106, 16, 'Nadeem', 3, 'Shop Two', 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, '3', 'PT', 12),
(16, 15, '0000-00-00', 5, 'Naeem Ahmed', 11898, 16, 'Nadeem', 1, 'Warehouse 2', 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, '2', 'PT', 12),
(17, 17, '0000-00-00', 4, 'Amjad Hanif', 124106, 16, 'Nadeem', 1, 'Warehouse 2', 12, 4, 4, 4, 4, 4, 4, 4, 4, 4, 'Abc Don', 'PT', 12),
(18, 17, '0000-00-00', 4, 'Amjad Hanif', 124106, 16, 'Nadeem', 1, 'Warehouse 2', 12, 4, 4, 4, 4, 4, 4, 4, 4, 4, 'Abc', 'PT', 12),
(19, 18, '0000-00-00', 5, 'Naeem Ahmed', 11898, 17, 'Chair', 1, 'Warehouse 2', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 'M Naeem Ahmed', 'PT', 12),
(20, 19, '0000-00-00', 4, 'Amjad Hanif', 124106, 14, 'samsung', 1, 'Warehouse 2', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '545 Naeem', 'PT', 12),
(21, 19, '0000-00-00', 5, 'Naeem Ahmed', 11898, 17, 'Chair', 3, 'Shop Two', 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, '3', 'PT', 12),
(22, 20, '0000-00-00', 4, 'Amjad Hanif', 124106, 14, 'samsung', 1, 'Warehouse 2', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '66', 'PT', 12),
(23, 20, '0000-00-00', 5, 'Naeem Ahmed', 11898, 16, 'Nadeem', 3, 'Shop Two', 5, 5, 5, 5, 5, 5, 5, 6, 6, 6, '6', 'PT', 12),
(24, 21, '0000-00-00', 4, 'Amjad Hanif', 124106, 16, 'Nadeem', 3, 'Shop Two', 4, 4, 4, 4, 4, 4, 4, 44, 4, 4, '4', 'PT', 12),
(25, 22, '0000-00-00', 2, 'Dummy 2', 13898, 16, 'Nadeem', 1, 'Warehouse 2', 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, '44', 'PT', 12),
(26, 23, '0000-00-00', 5, 'Naeem Ahmed', 11898, 14, 'samsung', 1, 'Warehouse 2', 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, '7', 'PT', 12),
(27, 24, '0000-00-00', 2, 'Dummy 2', 13898, 14, 'samsung', 1, 'Warehouse 2', 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, '9', 'PT', 12),
(28, 25, '0000-00-00', 5, 'Naeem Ahmed', 11898, 16, 'Nadeem', 1, 'Warehouse 2', 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, '6', 'PT', 12);

-- --------------------------------------------------------

--
-- Table structure for table `purchaseordertbl`
--

CREATE TABLE `purchaseordertbl` (
  `PurOrderId` int(50) NOT NULL,
  `PurOrderDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchaseordertbl`
--

INSERT INTO `purchaseordertbl` (`PurOrderId`, `PurOrderDate`) VALUES
(1, '2018-09-09'),
(2, '2018-09-09');

-- --------------------------------------------------------

--
-- Table structure for table `purchasereturntbl`
--

CREATE TABLE `purchasereturntbl` (
  `PrAutoId` int(11) NOT NULL,
  `PrOrderId` int(50) NOT NULL,
  `PrDate` varchar(250) NOT NULL,
  `PrSupCode` int(50) NOT NULL,
  `PrSupCodeName` varchar(250) NOT NULL,
  `PrSupBal` int(50) NOT NULL,
  `PrItemCode` int(50) NOT NULL,
  `PrItemName` varchar(250) NOT NULL,
  `PrWHCode` int(50) NOT NULL,
  `PrWHName` varchar(250) NOT NULL,
  `PrQty` int(50) NOT NULL,
  `PrStockQty` int(50) NOT NULL,
  `PrRate` int(50) NOT NULL,
  `PrTempRate` int(50) NOT NULL,
  `PrAmount` int(50) NOT NULL,
  `PrRemarks` varchar(250) NOT NULL,
  `PrTransType` varchar(250) NOT NULL DEFAULT 'PR'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchasereturntbl`
--

INSERT INTO `purchasereturntbl` (`PrAutoId`, `PrOrderId`, `PrDate`, `PrSupCode`, `PrSupCodeName`, `PrSupBal`, `PrItemCode`, `PrItemName`, `PrWHCode`, `PrWHName`, `PrQty`, `PrStockQty`, `PrRate`, `PrTempRate`, `PrAmount`, `PrRemarks`, `PrTransType`) VALUES
(5, 4, '16/09/2018', 2, 'Dummy 2', 13898, 14, 'samsung', 1, 'Warehouse 2', 1, 2, 0, 2, 2, '2', 'PT'),
(6, 5, '16/09/2018', 5, 'Naeem Ahmed', 11898, 16, 'Nadeem', 1, 'Warehouse 2', 8, 8, 0, 8, 8, '8', 'PT'),
(7, 6, '16/09/2018', 4, 'Amjad Hanif', 124106, 16, 'Nadeem', 1, 'Warehouse 2', 3, 3, 0, 3, 3, '3', 'PT'),
(8, 7, '16/09/2018', 4, 'Amjad Hanif', 124106, 17, 'Chair', 3, 'Shop Two', 1, 4, 0, 4, 4, '4', 'PT'),
(9, 8, '16/09/2018', 4, 'Amjad Hanif', 124106, 16, 'Nadeem', 1, 'Warehouse 2', 2, 2, 0, 2, 2, '2', 'PT'),
(10, 9, '17/09/2018', 4, 'Amjad Hanif', 124106, 14, 'samsung', 3, 'Shop Two', 5, 5, 0, 5, 5, '45000', 'PT'),
(11, 10, '17/09/2018', 4, 'Amjad Hanif', 124106, 14, 'samsung', 1, 'Warehouse 2', 2, 2, 0, 2, 2, '2', 'PT'),
(12, 11, '17/09/2018', 2, 'Dummy 2', 13898, 17, 'Chair', 1, 'Warehouse 2', 3, 3, 0, 3, 3, '3', 'PT'),
(13, 12, '17/09/2018', 5, 'Naeem Ahmed', 11898, 17, 'Chair', 3, 'Shop Two', 4, 4, 0, 4, 4, '4', 'PT'),
(14, 13, '17/09/2018', 4, 'Amjad Hanif', 124106, 21, 'Botle', 1, 'Warehouse 2', 3, 3, 0, 3, 3, '3', 'PT'),
(15, 14, '17/09/2018', 4, 'Amjad Hanif', 124106, 16, 'Nadeem', 3, 'Shop Two', 3, 3, 3, 3, 3, '3', 'PT'),
(16, 15, '17/09/2018', 5, 'Naeem Ahmed', 11898, 16, 'Nadeem', 1, 'Warehouse 2', 2, 2, 2, 2, 2, '2', 'PT'),
(17, 17, '17/09/2018', 4, 'Amjad Hanif', 124106, 16, 'Nadeem', 1, 'Warehouse 2', 12, 4, 4, 4, 4, 'Abc Don', 'PT'),
(18, 17, '17/09/2018', 4, 'Amjad Hanif', 124106, 16, 'Nadeem', 1, 'Warehouse 2', 12, 4, 4, 4, 4, 'Abc', 'PT'),
(19, 18, '18/09/2018', 5, 'Naeem Ahmed', 11898, 17, 'Chair', 1, 'Warehouse 2', 5, 5, 5, 5, 5, 'M Naeem Ahmed', 'PT'),
(20, 19, '18/09/2018', 4, 'Amjad Hanif', 124106, 14, 'samsung', 1, 'Warehouse 2', 5, 5, 5, 5, 5, '545 Naeem', 'PT'),
(21, 19, '18/09/2018', 5, 'Naeem Ahmed', 11898, 17, 'Chair', 3, 'Shop Two', 3, 3, 3, 3, 3, '3', 'PT'),
(22, 20, '18/09/2018', 4, 'Amjad Hanif', 124106, 14, 'samsung', 1, 'Warehouse 2', 5, 5, 5, 5, 5, '66', 'PT'),
(23, 20, '18/09/2018', 5, 'Naeem Ahmed', 11898, 16, 'Nadeem', 3, 'Shop Two', 5, 5, 6, 6, 6, '6', 'PT'),
(24, 21, '18/09/2018', 4, 'Amjad Hanif', 124106, 16, 'Nadeem', 3, 'Shop Two', 4, 4, 44, 4, 4, '4', 'PT'),
(25, 22, '19/09/2018', 2, 'Dummy 2', 13898, 16, 'Nadeem', 1, 'Warehouse 2', 4, 4, 4, 4, 4, '44', 'PT');

-- --------------------------------------------------------

--
-- Table structure for table `salareatbl`
--

CREATE TABLE `salareatbl` (
  `SalAreaId` int(50) NOT NULL,
  `SalAreaTitle` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salareatbl`
--

INSERT INTO `salareatbl` (`SalAreaId`, `SalAreaTitle`) VALUES
(1, 'Vehari123'),
(2, 'Multan123'),
(3, '220 KV Grid Station'),
(4, 'Islamabad'),
(5, 'Karachi'),
(6, 'Peshawar'),
(15, 'Red'),
(16, 'Blue'),
(17, 'Green'),
(18, 'Yellow and Green'),
(19, 'Sky Blue'),
(20, 'Lala Moosa');

-- --------------------------------------------------------

--
-- Table structure for table `salesitemgrouptbl`
--

CREATE TABLE `salesitemgrouptbl` (
  `ProGroupId` int(50) NOT NULL,
  `ProGroupTitle` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesitemgrouptbl`
--

INSERT INTO `salesitemgrouptbl` (`ProGroupId`, `ProGroupTitle`) VALUES
(2, 'Group Book'),
(3, 'Group Three'),
(4, 'Building Material'),
(5, 'Sanitary Material');

-- --------------------------------------------------------

--
-- Table structure for table `salesitemtbl`
--

CREATE TABLE `salesitemtbl` (
  `ProId` int(50) NOT NULL,
  `ProName` varchar(250) NOT NULL,
  `ProUomName` varchar(250) NOT NULL,
  `ProOpenQtyUnit` int(50) NOT NULL,
  `ProOpenRate` int(50) NOT NULL,
  `ProOpenBal` int(50) NOT NULL,
  `ProSalesRate` int(50) NOT NULL,
  `ProItemGroupName` varchar(250) NOT NULL,
  `ProductTypeName` int(50) DEFAULT NULL,
  `ProAccType` int(50) NOT NULL DEFAULT '3',
  `ProSort` int(50) NOT NULL DEFAULT '1',
  `ProSortName` varchar(250) NOT NULL DEFAULT '4. Revenue',
  `ProAddress` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesitemtbl`
--

INSERT INTO `salesitemtbl` (`ProId`, `ProName`, `ProUomName`, `ProOpenQtyUnit`, `ProOpenRate`, `ProOpenBal`, `ProSalesRate`, `ProItemGroupName`, `ProductTypeName`, `ProAccType`, `ProSort`, `ProSortName`, `ProAddress`) VALUES
(80001, 'DG Cement OP-C', 'Bag', 10, 500, 106000, 550, 'Building Material', NULL, 3, 1, '4. Revenue', ''),
(80002, 'Maple Leaf Cement', 'Bag', 150, 475, 132500, 525, 'Building Material', NULL, 3, 1, '4. Revenue', ''),
(80003, 'M Pipe 25mm', 'CM', 5000, 125, 17160, 175, 'Sanitary Material', NULL, 3, 1, '4. Revenue', '');

-- --------------------------------------------------------

--
-- Table structure for table `salesorderdetailtbl`
--

CREATE TABLE `salesorderdetailtbl` (
  `SaleAutoId` int(11) NOT NULL,
  `SaleOrderId` int(50) NOT NULL,
  `SaleDate` varchar(250) NOT NULL,
  `SaleCusCode` int(50) NOT NULL,
  `SaleCusCodeName` varchar(250) NOT NULL,
  `SaleCusBal` int(50) NOT NULL,
  `SaleItemCode` int(50) NOT NULL,
  `SaleItemName` varchar(250) NOT NULL,
  `SaleWHCode` int(50) NOT NULL,
  `SaleWHName` varchar(250) NOT NULL,
  `SaleQty` int(50) NOT NULL,
  `SaleStockQty` int(50) NOT NULL,
  `SalePreviousRate` int(50) NOT NULL,
  `SaleGrossRate` int(50) NOT NULL,
  `SaleGrossAmount` int(50) NOT NULL,
  `DisplayID` int(50) NOT NULL,
  `SaleRemarks` varchar(250) NOT NULL,
  `SaleTQty` int(50) NOT NULL,
  `SaleBillAmount` int(50) NOT NULL,
  `SaleDiscPercentage` int(50) NOT NULL,
  `SaleDiscountValue` int(50) NOT NULL,
  `SaleFreight` int(50) NOT NULL,
  `SaleNetBill` int(50) NOT NULL,
  `SaleTransType` varchar(250) NOT NULL DEFAULT 'ST'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesorderdetailtbl`
--

INSERT INTO `salesorderdetailtbl` (`SaleAutoId`, `SaleOrderId`, `SaleDate`, `SaleCusCode`, `SaleCusCodeName`, `SaleCusBal`, `SaleItemCode`, `SaleItemName`, `SaleWHCode`, `SaleWHName`, `SaleQty`, `SaleStockQty`, `SalePreviousRate`, `SaleGrossRate`, `SaleGrossAmount`, `DisplayID`, `SaleRemarks`, `SaleTQty`, `SaleBillAmount`, `SaleDiscPercentage`, `SaleDiscountValue`, `SaleFreight`, `SaleNetBill`, `SaleTransType`) VALUES
(1, 1, '2018-09-12', 1, 'Naeem AHmed', 0, 1, 'Laptop', 1, 'Warehouse', 7, 89, 0, 78, 67, 2, 'No Remarks', 89, 7, 78, 98, 0, 0, 'PT'),
(2, 2, '0000-00-00', 4, 'Amjad Hanif', 124106, 16, 'Nadeem', 1, 'Warehouse 2', 3, 3, 0, 3, 3, 3, '3', 3, 3, 3, 3, 0, 0, 'PT'),
(3, 3, '0000-00-00', 5, 'Naeem Ahmed', 11898, 14, 'samsung', 1, 'Warehouse 2', 1, 1, 0, 1, 1, 1, '1', 1, 1, 1, 1, 0, 0, 'PT'),
(4, 3, '0000-00-00', 4, 'Amjad Hanif', 124106, 17, 'Chair', 1, 'Warehouse 2', 2, 2, 0, 2, 2, 2, '2', 2, 2, 2, 2, 0, 0, 'PT'),
(5, 4, '16/09/2018', 2, 'Dummy 2', 13898, 14, 'samsung', 1, 'Warehouse 2', 1, 2, 0, 2, 2, 2, '2', 2, 2, 2, 2, 0, 0, 'PT'),
(6, 5, '16/09/2018', 5, 'Naeem Ahmed', 11898, 16, 'Nadeem', 1, 'Warehouse 2', 8, 8, 0, 8, 8, 8, '8', 8, 8, 8, 8, 0, 0, 'PT'),
(7, 6, '16/09/2018', 4, 'Amjad Hanif', 124106, 16, 'Nadeem', 1, 'Warehouse 2', 3, 3, 0, 3, 3, 3, '3', 3, 3, 3, 3, 0, 0, 'PT'),
(8, 7, '16/09/2018', 4, 'Amjad Hanif', 124106, 17, 'Chair', 3, 'Shop Two', 1, 4, 0, 4, 4, 4, '4', 4, 4, 4, 4, 0, 0, 'PT'),
(9, 8, '16/09/2018', 4, 'Amjad Hanif', 124106, 16, 'Nadeem', 1, 'Warehouse 2', 2, 2, 0, 2, 2, 2, '2', 2, 2, 2, 2, 0, 0, 'PT'),
(10, 9, '17/09/2018', 4, 'Amjad Hanif', 124106, 14, 'samsung', 3, 'Shop Two', 5, 5, 0, 5, 5, 5, '45000', 5, 5, 5, 5, 0, 0, 'PT'),
(11, 10, '17/09/2018', 4, 'Amjad Hanif', 124106, 14, 'samsung', 1, 'Warehouse 2', 2, 2, 0, 2, 2, 2, '2', 2, 2, 2, 2, 0, 0, 'PT'),
(12, 11, '17/09/2018', 2, 'Dummy 2', 13898, 17, 'Chair', 1, 'Warehouse 2', 3, 3, 0, 3, 3, 3, '3', 3, 3, 3, 3, 0, 0, 'PT'),
(13, 12, '17/09/2018', 5, 'Naeem Ahmed', 11898, 17, 'Chair', 3, 'Shop Two', 4, 4, 0, 4, 4, 4, '4', 4, 4, 4, 4, 0, 0, 'PT'),
(14, 13, '17/09/2018', 4, 'Amjad Hanif', 124106, 21, 'Botle', 1, 'Warehouse 2', 3, 3, 0, 3, 3, 3, '3', 3, 3, 3, 3, 0, 0, 'PT'),
(15, 14, '17/09/2018', 4, 'Amjad Hanif', 124106, 16, 'Nadeem', 3, 'Shop Two', 3, 3, 0, 3, 3, 3, '3', 3, 3, 3, 3, 3, 0, 'PT'),
(16, 15, '17/09/2018', 5, 'Naeem Ahmed', 11898, 16, 'Nadeem', 1, 'Warehouse 2', 2, 2, 0, 2, 2, 2, '2', 2, 2, 2, 2, 2, 0, 'PT'),
(17, 17, '17/09/2018', 4, 'Amjad Hanif', 124106, 16, 'Nadeem', 1, 'Warehouse 2', 12, 4, 0, 4, 4, 4, 'Abc Don', 4, 4, 4, 4, 4, 0, 'PT'),
(18, 17, '17/09/2018', 4, 'Amjad Hanif', 124106, 16, 'Nadeem', 1, 'Warehouse 2', 12, 4, 0, 4, 4, 4, 'Abc', 4, 4, 4, 4, 4, 0, 'PT'),
(19, 18, '18/09/2018', 5, 'Naeem Ahmed', 11898, 17, 'Chair', 1, 'Warehouse 2', 5, 5, 0, 5, 5, 5, 'M Naeem Ahmed', 5, 5, 5, 5, 5, 0, 'PT'),
(20, 19, '18/09/2018', 4, 'Amjad Hanif', 124106, 14, 'samsung', 1, 'Warehouse 2', 5, 5, 0, 5, 5, 5, '545 Naeem', 5, 5, 5, 5, 5, 0, 'PT'),
(21, 19, '18/09/2018', 5, 'Naeem Ahmed', 11898, 17, 'Chair', 3, 'Shop Two', 3, 3, 0, 3, 3, 3, '3', 3, 3, 3, 3, 3, 0, 'PT'),
(22, 20, '18/09/2018', 4, 'Amjad Hanif', 124106, 14, 'samsung', 1, 'Warehouse 2', 5, 5, 0, 5, 5, 5, '66', 5, 5, 5, 5, 5, 0, 'PT'),
(23, 20, '18/09/2018', 5, 'Naeem Ahmed', 11898, 16, 'Nadeem', 3, 'Shop Two', 5, 5, 0, 5, 5, 6, '6', 5, 5, 5, 6, 6, 0, 'PT');

-- --------------------------------------------------------

--
-- Table structure for table `salesproducttypetbl`
--

CREATE TABLE `salesproducttypetbl` (
  `ProductTypeId` int(50) NOT NULL,
  `ProductTypeName` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesproducttypetbl`
--

INSERT INTO `salesproducttypetbl` (`ProductTypeId`, `ProductTypeName`) VALUES
(2, 'Old Item Name'),
(3, 'Desktop Version');

-- --------------------------------------------------------

--
-- Table structure for table `suptbl`
--

CREATE TABLE `suptbl` (
  `SupId` int(50) NOT NULL,
  `SupName` varchar(250) NOT NULL,
  `SupAddress` varchar(250) NOT NULL,
  `SupContact` varchar(250) NOT NULL,
  `SupOpenBal` int(50) NOT NULL,
  `SupAccType` int(50) NOT NULL DEFAULT '2',
  `SupSort` int(50) NOT NULL DEFAULT '1',
  `SupSortName` varchar(250) NOT NULL DEFAULT '2. Liabilities'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suptbl`
--

INSERT INTO `suptbl` (`SupId`, `SupName`, `SupAddress`, `SupContact`, `SupOpenBal`, `SupAccType`, `SupSort`, `SupSortName`) VALUES
(20001, 'Pioneer Cement ', 'Multan', '', 1366215, 2, 1, '2. Liabilities'),
(20002, 'Maqsood Ahmad', 'Vehari', '', 280441, 2, 1, '2. Liabilities'),
(20003, 'Arshad Malik', 'Multan', '', -350425, 2, 1, '2. Liabilities'),
(20004, 'Sadiq Traders ', 'Multan', '', -182005, 2, 1, '2. Liabilities');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `order_no` int(50) NOT NULL,
  `order_date` varchar(250) NOT NULL,
  `order_receiver_name` varchar(250) NOT NULL,
  `order_receiver_remarks` varchar(500) NOT NULL,
  `order_total_before_discount_freight` decimal(10,2) NOT NULL,
  `order_total_discount_percentage` decimal(10,2) NOT NULL,
  `order_total_discount_value` decimal(10,2) NOT NULL,
  `order_total_freight` decimal(10,2) NOT NULL,
  `order_total_after_discount_freight` decimal(10,2) NOT NULL,
  `order_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `order_no`, `order_date`, `order_receiver_name`, `order_receiver_remarks`, `order_total_before_discount_freight`, `order_total_discount_percentage`, `order_total_discount_value`, `order_total_freight`, `order_total_after_discount_freight`, `order_datetime`) VALUES
(6, 4, '29/09/2018', 'Amjad', '220KV Grid Station', '500.00', '5.00', '250.00', '250.00', '500.00', '2018-09-29 00:00:00'),
(11, 5, '05/10/2018', 'Naeem', 'no', '21.00', '0.00', '0.00', '0.00', '21.00', '2018-10-05 00:00:00'),
(12, 6, '06/10/2018', 'Jamal Ahmed', 'no', '72.00', '0.00', '0.00', '0.00', '72.00', '2018-10-06 00:00:00'),
(13, 7, '07/10/2018', 'Jutt', '', '64.00', '0.00', '0.00', '0.00', '64.00', '2018-10-07 00:00:00'),
(14, 8, '07/10/2018', 'Jut2', 'no', '106.00', '0.00', '0.00', '0.00', '106.00', '2018-10-07 00:00:00'),
(21, 10, '08/10/2018', 'Imran', 'No', '25.00', '0.00', '0.00', '0.00', '25.00', '2018-10-08 00:00:00'),
(23, 11, '08/10/2018', 'Imran khan', '', '41.00', '0.00', '0.00', '0.00', '41.00', '2018-10-08 00:00:00'),
(27, 15, '11/10/2018', 'Ghs 567', 'govt high school', '3550.00', '0.00', '20.00', '200.00', '3730.00', '2018-10-11 00:00:00'),
(28, 16, '11/10/2018', 'Asad Umar', 'Address', '6030.00', '8.00', '482.40', '200.00', '5747.60', '2018-10-11 00:00:00'),
(29, 17, '13/10/2018', 'Kaleem', 'No Remarks', '1200.00', '10.00', '120.00', '20.00', '1100.00', '2018-10-13 00:00:00'),
(30, 18, '13/10/2018', '40-Parveen Shakar', '', '40.00', '12.00', '4.80', '10.00', '45.20', '2018-10-13 00:00:00'),
(31, 19, '13/10/2018', '36', '', '10.00', '0.00', '0.00', '0.00', '10.00', '2018-10-13 00:00:00'),
(32, 20, '13/10/2018', 'Amjad Hanif', '', '10.00', '0.00', '0.00', '0.00', '10.00', '2018-10-13 00:00:00'),
(33, 21, '13/10/2018', 'Parveen Shakar', 'Lalazar Colony Vehari', '300.00', '0.00', '0.00', '0.00', '300.00', '2018-10-13 00:00:00'),
(34, 22, '13/10/2018', 'Kamran Ahmed', '', '1045.00', '0.00', '0.00', '0.00', '1045.00', '2018-10-13 00:00:00'),
(35, 23, '17/10/2018', 'KOt', 'Address', '12.00', '55.00', '6.60', '10.00', '15.40', '2018-10-17 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_item`
--

CREATE TABLE `tbl_order_item` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `order_item_whname` varchar(250) NOT NULL,
  `order_item_quantity` decimal(10,2) NOT NULL,
  `order_item_squantity` decimal(10,2) NOT NULL,
  `order_item_prate` decimal(10,2) NOT NULL,
  `order_item_grate` decimal(10,2) NOT NULL,
  `order_item_gamount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order_item`
--

INSERT INTO `tbl_order_item` (`order_item_id`, `order_id`, `item_name`, `order_item_whname`, `order_item_quantity`, `order_item_squantity`, `order_item_prate`, `order_item_grate`, `order_item_gamount`) VALUES
(390, 6, 'Fan', 'Shop1', '5.00', '5.00', '5.00', '100.00', '500.00'),
(404, 10, 'Cup', 'Shop', '5.00', '5.00', '5.00', '5.00', '25.00'),
(405, 11, 'no', 'no', '3.00', '7.00', '7.00', '7.00', '21.00'),
(406, 12, 'i', 'i', '8.00', '9.00', '8.00', '9.00', '72.00'),
(407, 13, 'Cup', 'cup', '8.00', '8.00', '8.00', '8.00', '64.00'),
(435, 21, 'item', 'no', '5.00', '5.00', '5.00', '5.00', '25.00'),
(438, 23, 't', 't', '5.00', '5.00', '5.00', '5.00', '25.00'),
(439, 23, 'r', 'r', '4.00', '4.00', '4.00', '4.00', '16.00'),
(457, 14, 'mug', 'mug', '9.00', '9.00', '9.00', '9.00', '81.00'),
(458, 14, 'Cup', 'shop', '5.00', '5.00', '5.00', '5.00', '25.00'),
(632, 28, '22-Keyboard', 'Shop 2', '60.00', '5.00', '5.00', '100.00', '6000.00'),
(633, 28, '17-Chair', '3-Shop Two', '6.00', '5.00', '5.00', '5.00', '30.00'),
(638, 27, '2-Dell', 'No', '5.00', '10.00', '0.00', '300.00', '1500.00'),
(639, 27, '4-Asus', 'Shop 2', '50.00', '70.00', '0.00', '20.00', '1000.00'),
(640, 27, '3-IBM', 'No', '5.00', '25.00', '0.00', '50.00', '250.00'),
(641, 27, '1-HP', 'N0', '4.00', '5.00', '0.00', '200.00', '800.00'),
(644, 29, '16-Nadeem', '1-Warehouse 2', '6.00', '6.00', '6.00', '200.00', '1200.00'),
(645, 30, '17-Chair', '1-Warehouse 2', '6.00', '5.00', '5.00', '5.00', '30.00'),
(646, 30, '14-samsung', '3-Shop Two', '5.00', '5.00', '5.00', '2.00', '10.00'),
(647, 31, '14-samsung', '1-Warehouse 2', '5.00', '5.00', '5.00', '2.00', '10.00'),
(648, 0, '16-Nadeem', '1-Warehouse 2', '5.00', '6.00', '6.00', '200.00', '1000.00'),
(649, 32, '14-samsung', '1-Warehouse 2', '5.00', '5.00', '5.00', '2.00', '10.00'),
(652, 33, '5', '5', '5.00', '5.00', '5.00', '5.00', '25.00'),
(653, 33, 'no', 'no', '5.00', '5.00', '5.00', '55.00', '275.00'),
(665, 34, 'samsung', 'Warehouse 2', '5.00', '5.00', '5.00', '2.00', '10.00'),
(666, 34, 'Chair', 'Warehouse 2', '5.00', '5.00', '5.00', '5.00', '25.00'),
(667, 34, 'Keyboard', 'Warehouse 2', '10.00', '5.00', '5.00', '100.00', '1000.00'),
(669, 35, 'samsung', 'Warehouse 2', '6.00', '5.00', '5.00', '2.00', '12.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_item_purchase`
--

CREATE TABLE `tbl_order_item_purchase` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `order_item_whname` varchar(250) NOT NULL,
  `order_item_quantity` decimal(10,2) NOT NULL,
  `order_item_squantity` decimal(10,2) NOT NULL,
  `order_item_prate` decimal(10,2) NOT NULL,
  `order_item_grate` decimal(10,2) NOT NULL,
  `order_item_gamount` decimal(10,2) NOT NULL,
  `order_item_disc_percent` decimal(10,2) NOT NULL,
  `order_item_disc_value` decimal(10,2) NOT NULL,
  `order_item_disc_rate` decimal(10,2) NOT NULL,
  `order_item_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order_item_purchase`
--

INSERT INTO `tbl_order_item_purchase` (`order_item_id`, `order_id`, `item_name`, `order_item_whname`, `order_item_quantity`, `order_item_squantity`, `order_item_prate`, `order_item_grate`, `order_item_gamount`, `order_item_disc_percent`, `order_item_disc_value`, `order_item_disc_rate`, `order_item_amount`) VALUES
(390, 6, 'Fan', 'Shop1', '5.00', '5.00', '5.00', '100.00', '500.00', '0.00', '0.00', '0.00', '0.00'),
(404, 10, 'Cup', 'Shop', '5.00', '5.00', '5.00', '5.00', '25.00', '0.00', '0.00', '0.00', '0.00'),
(405, 11, 'no', 'no', '3.00', '7.00', '7.00', '7.00', '21.00', '0.00', '0.00', '0.00', '0.00'),
(406, 12, 'i', 'i', '8.00', '9.00', '8.00', '9.00', '72.00', '0.00', '0.00', '0.00', '0.00'),
(407, 13, 'Cup', 'cup', '8.00', '8.00', '8.00', '8.00', '64.00', '0.00', '0.00', '0.00', '0.00'),
(435, 21, 'item', 'no', '5.00', '5.00', '5.00', '5.00', '25.00', '0.00', '0.00', '0.00', '0.00'),
(438, 23, 't', 't', '5.00', '5.00', '5.00', '5.00', '25.00', '0.00', '0.00', '0.00', '0.00'),
(439, 23, 'r', 'r', '4.00', '4.00', '4.00', '4.00', '16.00', '0.00', '0.00', '0.00', '0.00'),
(457, 14, 'mug', 'mug', '9.00', '9.00', '9.00', '9.00', '81.00', '0.00', '0.00', '0.00', '0.00'),
(458, 14, 'Cup', 'shop', '5.00', '5.00', '5.00', '5.00', '25.00', '0.00', '0.00', '0.00', '0.00'),
(632, 28, '22-Keyboard', 'Shop 2', '60.00', '5.00', '5.00', '100.00', '6000.00', '0.00', '0.00', '0.00', '0.00'),
(633, 28, '17-Chair', '3-Shop Two', '6.00', '5.00', '5.00', '5.00', '30.00', '0.00', '0.00', '0.00', '0.00'),
(638, 27, '2-Dell', 'No', '5.00', '10.00', '0.00', '300.00', '1500.00', '0.00', '0.00', '0.00', '0.00'),
(639, 27, '4-Asus', 'Shop 2', '50.00', '70.00', '0.00', '20.00', '1000.00', '0.00', '0.00', '0.00', '0.00'),
(640, 27, '3-IBM', 'No', '5.00', '25.00', '0.00', '50.00', '250.00', '0.00', '0.00', '0.00', '0.00'),
(641, 27, '1-HP', 'N0', '4.00', '5.00', '0.00', '200.00', '800.00', '0.00', '0.00', '0.00', '0.00'),
(644, 29, '16-Nadeem', '1-Warehouse 2', '6.00', '6.00', '6.00', '200.00', '1200.00', '0.00', '0.00', '0.00', '0.00'),
(645, 30, '17-Chair', '1-Warehouse 2', '6.00', '5.00', '5.00', '5.00', '30.00', '0.00', '0.00', '0.00', '0.00'),
(646, 30, '14-samsung', '3-Shop Two', '5.00', '5.00', '5.00', '2.00', '10.00', '0.00', '0.00', '0.00', '0.00'),
(647, 31, '14-samsung', '1-Warehouse 2', '5.00', '5.00', '5.00', '2.00', '10.00', '0.00', '0.00', '0.00', '0.00'),
(648, 0, '16-Nadeem', '1-Warehouse 2', '5.00', '6.00', '6.00', '200.00', '1000.00', '0.00', '0.00', '0.00', '0.00'),
(649, 32, '14-samsung', '1-Warehouse 2', '5.00', '5.00', '5.00', '2.00', '10.00', '0.00', '0.00', '0.00', '0.00'),
(652, 33, '5', '5', '5.00', '5.00', '5.00', '5.00', '25.00', '0.00', '0.00', '0.00', '0.00'),
(653, 33, 'no', 'no', '5.00', '5.00', '5.00', '55.00', '275.00', '0.00', '0.00', '0.00', '0.00'),
(669, 0, 'samsung', 'Warehouse 2', '5.00', '5.00', '5.00', '2.00', '10.00', '5.00', '0.10', '1.90', '9.50'),
(670, 0, 'Chair', 'Warehouse 2', '45.00', '5.00', '5.00', '5.00', '225.00', '55.00', '2.75', '2.25', '101.25'),
(671, 0, 'samsung', 'Warehouse 2', '5.00', '5.00', '5.00', '2.00', '10.00', '50.00', '1.00', '1.00', '5.00'),
(726, 34, 'samsung', 'Warehouse 2', '5.00', '5.00', '5.00', '2.00', '10.00', '5.00', '0.10', '1.90', '9.50'),
(727, 34, 'Chair', 'Warehouse 2', '5.00', '5.00', '5.00', '5.00', '25.00', '20.00', '1.00', '4.00', '20.00'),
(728, 34, 'Keyboard', 'Warehouse 2', '10.00', '5.00', '5.00', '100.00', '1000.00', '2.00', '2.00', '98.00', '980.00'),
(783, 41, 'samsung', 'Warehouse 2', '5.00', '5.00', '5.00', '2.00', '10.00', '50.00', '1.00', '1.00', '5.00'),
(784, 42, 'sf', 'Warehouse 2', '5.00', '56.00', '56.00', '5.00', '25.00', '5.00', '0.25', '4.75', '23.75'),
(805, 58, 'Nadeem', 'Warehouse 2', '5.00', '6.00', '6.00', '200.00', '1000.00', '6.00', '12.00', '188.00', '940.00'),
(806, 58, 'samsung', 'Warehouse 2', '4.00', '5.00', '5.00', '2.00', '8.00', '4.00', '0.08', '1.92', '7.68'),
(925, 61, 'samsung', 'Shop 5', '5.00', '5.00', '5.00', '2.00', '10.00', '5.00', '0.10', '1.90', '10.00'),
(926, 61, 'samsung', 'Warehouse 2', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(927, 61, 'samsung', 'Warehouse 2', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_purchase`
--

CREATE TABLE `tbl_order_purchase` (
  `order_id` int(11) NOT NULL,
  `order_no` int(50) NOT NULL,
  `order_date` varchar(250) NOT NULL,
  `order_receiver_name` varchar(250) NOT NULL,
  `order_receiver_remarks` varchar(500) NOT NULL,
  `order_total_qty` decimal(10,2) NOT NULL,
  `order_total_before_discount` decimal(10,2) NOT NULL,
  `order_total_discount_value` decimal(10,2) NOT NULL,
  `order_total_after_discount` decimal(10,2) NOT NULL,
  `order_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order_purchase`
--

INSERT INTO `tbl_order_purchase` (`order_id`, `order_no`, `order_date`, `order_receiver_name`, `order_receiver_remarks`, `order_total_qty`, `order_total_before_discount`, `order_total_discount_value`, `order_total_after_discount`, `order_datetime`) VALUES
(6, 4, '29/09/2018', 'Amjad', '220KV Grid Station', '500.00', '5.00', '250.00', '500.00', '2018-09-29 00:00:00'),
(11, 5, '05/10/2018', 'Naeem', 'no', '21.00', '0.00', '0.00', '21.00', '2018-10-05 00:00:00'),
(12, 6, '06/10/2018', 'Jamal Ahmed', 'no', '72.00', '0.00', '0.00', '72.00', '2018-10-06 00:00:00'),
(13, 7, '07/10/2018', 'Jutt', '', '64.00', '0.00', '0.00', '64.00', '2018-10-07 00:00:00'),
(14, 8, '07/10/2018', 'Jut2', 'no', '106.00', '0.00', '0.00', '106.00', '2018-10-07 00:00:00'),
(21, 10, '08/10/2018', 'Imran', 'No', '25.00', '0.00', '0.00', '25.00', '2018-10-08 00:00:00'),
(23, 11, '08/10/2018', 'Imran khan', '', '41.00', '0.00', '0.00', '41.00', '2018-10-08 00:00:00'),
(27, 15, '11/10/2018', 'Ghs 567', 'govt high school', '3550.00', '0.00', '20.00', '3730.00', '2018-10-11 00:00:00'),
(28, 16, '11/10/2018', 'Asad Umar', 'Address', '6030.00', '8.00', '482.40', '5747.60', '2018-10-11 00:00:00'),
(29, 17, '13/10/2018', 'Kaleem', 'No Remarks', '1200.00', '10.00', '120.00', '1100.00', '2018-10-13 00:00:00'),
(30, 18, '13/10/2018', '40-Parveen Shakar', '', '40.00', '12.00', '4.80', '45.20', '2018-10-13 00:00:00'),
(31, 19, '13/10/2018', '36', '', '10.00', '0.00', '0.00', '10.00', '2018-10-13 00:00:00'),
(32, 20, '13/10/2018', 'Amjad Hanif', '', '10.00', '0.00', '0.00', '10.00', '2018-10-13 00:00:00'),
(33, 21, '13/10/2018', 'Parveen Shakar', 'Lalazar Colony Vehari', '300.00', '0.00', '0.00', '300.00', '2018-10-13 00:00:00'),
(34, 22, '13/10/2018', 'Kamran Ahmed', '', '20.00', '1035.00', '3.10', '1009.50', '2018-10-13 00:00:00'),
(41, 23, '17/10/2018', 'KOt', '', '10.00', '20.00', '1.10', '14.50', '2018-10-17 00:00:00'),
(42, 24, '20/10/2018', 'Amjad Hanif', '', '5.00', '25.00', '0.25', '23.75', '2018-10-20 00:00:00'),
(58, 35, '20/10/2018', 'Amjad Hanif', '', '9.00', '1008.00', '12.08', '947.68', '2018-10-20 00:00:00'),
(61, 38, '20/10/2018', 'KOt', '', '5.00', '10.00', '0.10', '10.00', '2018-10-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `uomtbl`
--

CREATE TABLE `uomtbl` (
  `UomId` int(50) NOT NULL,
  `UomName` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uomtbl`
--

INSERT INTO `uomtbl` (`UomId`, `UomName`) VALUES
(1, 'Kg'),
(2, 'Gb'),
(3, 'Meters'),
(4, 'Liters'),
(5, 'CM'),
(6, 'Bag');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `retype_pass` varchar(250) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_role` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `user`, `pass`, `retype_pass`, `email`, `user_role`) VALUES
(2, 'Admin', '1234', '', 'abc@gmail.com', 1),
(3, 'Naeem', '1234', '', 'naeem@gmail.com', 2),
(4, 'User', '1234', '1234', 'user@gmail.com', 2),
(5, 'kasdfh', '9', '9', '9', 2),
(6, 'hg', '999', '999', '2', 2),
(7, 'uom', '456', '456', '456', 2),
(9, 'teh', '5', '5', 'ghs', 2),
(10, 'gh', '4', '4', '4', 2),
(12, 'kjl', '4', '4', 'dfgh', 2),
(13, 'kalemm', '4', '4', 'sdf', 2),
(14, 'Naeem Ahmed', '789', '789', 'gmail@gmail.com', 2),
(15, 'Ball', '4', '4', 'sdf@gmail.com', 2),
(16, 'imran', '45', '45', 'asdf', 2),
(17, 'kal', '4', '4', 'sf', 2),
(18, 'alskdj', '8', '8', 'asfdj', 2),
(19, 'asdj', '3', '3', 'sfs@', 2);

-- --------------------------------------------------------

--
-- Table structure for table `wharehousetbl`
--

CREATE TABLE `wharehousetbl` (
  `WarehouseId` int(50) NOT NULL,
  `WarehouseName` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wharehousetbl`
--

INSERT INTO `wharehousetbl` (`WarehouseId`, `WarehouseName`) VALUES
(1, 'Warehouse 2'),
(3, 'Shop Two'),
(4, 'Shop3'),
(5, 'Shop4'),
(6, 'Shop 5'),
(7, 'Shop 6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acctypetbl`
--
ALTER TABLE `acctypetbl`
  ADD PRIMARY KEY (`AccId`);

--
-- Indexes for table `assettbl`
--
ALTER TABLE `assettbl`
  ADD PRIMARY KEY (`AssId`),
  ADD KEY `AssAccType` (`AssAccType`);

--
-- Indexes for table `cashpaidtbl`
--
ALTER TABLE `cashpaidtbl`
  ADD PRIMARY KEY (`cashid`);

--
-- Indexes for table `cashreceivetbl`
--
ALTER TABLE `cashreceivetbl`
  ADD PRIMARY KEY (`cashrid`);

--
-- Indexes for table `companytbl`
--
ALTER TABLE `companytbl`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `customertbl`
--
ALTER TABLE `customertbl`
  ADD PRIMARY KEY (`CusId`),
  ADD KEY `CusAccType` (`CusAccType`),
  ADD KEY `CusAreaName` (`CusAreaName`);

--
-- Indexes for table `exptbl`
--
ALTER TABLE `exptbl`
  ADD PRIMARY KEY (`ExpId`),
  ADD KEY `ExpAccType` (`ExpSort`);

--
-- Indexes for table `gttbl`
--
ALTER TABLE `gttbl`
  ADD PRIMARY KEY (`gtid`);

--
-- Indexes for table `liabtbl`
--
ALTER TABLE `liabtbl`
  ADD PRIMARY KEY (`LiabId`),
  ADD KEY `LiabAccType` (`LiabSort`);

--
-- Indexes for table `purchaseorderdetailtbl`
--
ALTER TABLE `purchaseorderdetailtbl`
  ADD PRIMARY KEY (`PurAutoId`),
  ADD KEY `PurOrderId` (`PurOrderId`),
  ADD KEY `PurSupCodeName` (`PurSupCode`),
  ADD KEY `PurItemName` (`PurItemCode`),
  ADD KEY `PurWHName` (`PurWHCode`);

--
-- Indexes for table `purchaseordertbl`
--
ALTER TABLE `purchaseordertbl`
  ADD PRIMARY KEY (`PurOrderId`);

--
-- Indexes for table `purchasereturntbl`
--
ALTER TABLE `purchasereturntbl`
  ADD PRIMARY KEY (`PrAutoId`),
  ADD KEY `PurOrderId` (`PrOrderId`),
  ADD KEY `PurSupCodeName` (`PrSupCode`),
  ADD KEY `PurItemName` (`PrItemCode`),
  ADD KEY `PurWHName` (`PrWHCode`);

--
-- Indexes for table `salareatbl`
--
ALTER TABLE `salareatbl`
  ADD PRIMARY KEY (`SalAreaId`);

--
-- Indexes for table `salesitemgrouptbl`
--
ALTER TABLE `salesitemgrouptbl`
  ADD PRIMARY KEY (`ProGroupId`);

--
-- Indexes for table `salesitemtbl`
--
ALTER TABLE `salesitemtbl`
  ADD PRIMARY KEY (`ProId`),
  ADD KEY `ProAccType` (`ProAccType`),
  ADD KEY `ProItemGroupName` (`ProItemGroupName`),
  ADD KEY `ProductTypeName` (`ProductTypeName`),
  ADD KEY `ProUomName` (`ProUomName`);

--
-- Indexes for table `salesorderdetailtbl`
--
ALTER TABLE `salesorderdetailtbl`
  ADD PRIMARY KEY (`SaleAutoId`),
  ADD KEY `PurOrderId` (`SaleOrderId`),
  ADD KEY `PurSupCodeName` (`SaleCusCode`),
  ADD KEY `PurItemName` (`SaleItemCode`),
  ADD KEY `PurWHName` (`SaleWHCode`);

--
-- Indexes for table `salesproducttypetbl`
--
ALTER TABLE `salesproducttypetbl`
  ADD PRIMARY KEY (`ProductTypeId`);

--
-- Indexes for table `suptbl`
--
ALTER TABLE `suptbl`
  ADD PRIMARY KEY (`SupId`),
  ADD KEY `SupAccType` (`SupAccType`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_item`
--
ALTER TABLE `tbl_order_item`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `tbl_order_item_purchase`
--
ALTER TABLE `tbl_order_item_purchase`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `tbl_order_purchase`
--
ALTER TABLE `tbl_order_purchase`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `uomtbl`
--
ALTER TABLE `uomtbl`
  ADD PRIMARY KEY (`UomId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wharehousetbl`
--
ALTER TABLE `wharehousetbl`
  ADD PRIMARY KEY (`WarehouseId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acctypetbl`
--
ALTER TABLE `acctypetbl`
  MODIFY `AccId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `assettbl`
--
ALTER TABLE `assettbl`
  MODIFY `AssId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `companytbl`
--
ALTER TABLE `companytbl`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customertbl`
--
ALTER TABLE `customertbl`
  MODIFY `CusId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `exptbl`
--
ALTER TABLE `exptbl`
  MODIFY `ExpId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `liabtbl`
--
ALTER TABLE `liabtbl`
  MODIFY `LiabId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `purchaseorderdetailtbl`
--
ALTER TABLE `purchaseorderdetailtbl`
  MODIFY `PurAutoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `purchaseordertbl`
--
ALTER TABLE `purchaseordertbl`
  MODIFY `PurOrderId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchasereturntbl`
--
ALTER TABLE `purchasereturntbl`
  MODIFY `PrAutoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `salareatbl`
--
ALTER TABLE `salareatbl`
  MODIFY `SalAreaId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `salesitemgrouptbl`
--
ALTER TABLE `salesitemgrouptbl`
  MODIFY `ProGroupId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `salesitemtbl`
--
ALTER TABLE `salesitemtbl`
  MODIFY `ProId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `salesorderdetailtbl`
--
ALTER TABLE `salesorderdetailtbl`
  MODIFY `SaleAutoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `salesproducttypetbl`
--
ALTER TABLE `salesproducttypetbl`
  MODIFY `ProductTypeId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `suptbl`
--
ALTER TABLE `suptbl`
  MODIFY `SupId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_order_item`
--
ALTER TABLE `tbl_order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=670;

--
-- AUTO_INCREMENT for table `tbl_order_item_purchase`
--
ALTER TABLE `tbl_order_item_purchase`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=928;

--
-- AUTO_INCREMENT for table `tbl_order_purchase`
--
ALTER TABLE `tbl_order_purchase`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `uomtbl`
--
ALTER TABLE `uomtbl`
  MODIFY `UomId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `wharehousetbl`
--
ALTER TABLE `wharehousetbl`
  MODIFY `WarehouseId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customertbl`
--
ALTER TABLE `customertbl`
  ADD CONSTRAINT `customertbl_ibfk_1` FOREIGN KEY (`CusAccType`) REFERENCES `acctypetbl` (`AccId`);

--
-- Constraints for table `exptbl`
--
ALTER TABLE `exptbl`
  ADD CONSTRAINT `exptbl_ibfk_1` FOREIGN KEY (`ExpSort`) REFERENCES `acctypetbl` (`AccId`);

--
-- Constraints for table `liabtbl`
--
ALTER TABLE `liabtbl`
  ADD CONSTRAINT `liabtbl_ibfk_1` FOREIGN KEY (`LiabSort`) REFERENCES `acctypetbl` (`AccId`);

--
-- Constraints for table `suptbl`
--
ALTER TABLE `suptbl`
  ADD CONSTRAINT `suptbl_ibfk_1` FOREIGN KEY (`SupAccType`) REFERENCES `acctypetbl` (`AccId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
