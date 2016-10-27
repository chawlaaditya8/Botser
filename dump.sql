
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 27, 2016 at 02:35 PM
-- Server version: 10.0.22-MariaDB
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u589473381_root`
--

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE IF NOT EXISTS `properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `userid` int(11) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `Locality` varchar(200) NOT NULL,
  `address` text,
  `long_description` text,
  `price` float NOT NULL,
  `link` varchar(100) DEFAULT NULL,
  `status_u` varchar(200) NOT NULL DEFAULT 'Active',
  `status_a` varchar(200) NOT NULL DEFAULT 'Inactive',
  `gender` text,
  `state` text,
  `type` text,
  `contact_person` text NOT NULL,
  `lat` double NOT NULL DEFAULT '0',
  `lang` double NOT NULL DEFAULT '0',
  `red_counter` int(11) NOT NULL DEFAULT '0',
  `click_counter` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=92 ;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `name`, `userid`, `image`, `Locality`, `address`, `long_description`, `price`, `link`, `status_u`, `status_a`, `gender`, `state`, `type`, `contact_person`, `lat`, `lang`, `red_counter`, `click_counter`) VALUES
(55, 'Final Testing', 3, NULL, '', 'C-4 Dwarka', 'Awesome deals here.', 18800, 'http://polypolymer.xyz', 'Active', 'Inactive', 'Both', 'New Delhi', 'mint', 'Aditya Chawla', 0, 0, 0, 2),
(56, 'Aditya Chawla', 1, NULL, '', '1180\nDr.Mukherjee Nagar', 'Sale on top products', 15000, 'http://polypolymer.xyz/images/deals/4.png', 'Active', 'Inactive', 'Both', 'Gurgaon', 'blue', 'Aditya Chawla', 0, 0, 17, 22),
(57, 'Full Furnished Flats', 4, '57.jpg', '', 'U62/1 DLF Cyber City Phase 3', 'Best deals here.', 10000, 'http://polypolymer.xyz/images/deals/5.png', 'Inactive', 'Inactive', 'Both', 'Gurgaon', 'blue', 'Ishan Tripathi', 0, 0, 2, 3),
(79, 'Olay Total Effects 7 in One Foaming Cleanser', 2, NULL, '', 'Water, Glycerin, Myristic Acid, Stearic Acid, Palmitic Acid, Sodium Lauroyl Sarcosinate, Potassium Hydroxide, Lauric Acid, Polyquaternium-10, DMDM Hydantoin, Fragrance, Tetrasodium Etidronate, Pentasodium Pentetate, Linalool, Benzyl Benzoate, Benzyl Salicylate, Alpha-Isomethyl Ionone, Iodopropynyl Butylcarbamate, Niacinamide.', 'Total Effects Cleanser works gently on the skin to remove dirt, make-up and excess oil without over drying your skin. its Non Comedogenic formula works actively to lift away dull surface skin and revitalize your skin completely.', 40, NULL, 'Active', 'Inactive', NULL, NULL, 'mint', 'mint', 0, 0, 0, 0),
(80, 'Olay Regenerist Revitalising Cream Cleanser', 2, NULL, '', 'Water, PPG-15 Stearyl Ether, Glycerin, Oxidized Polyethylene, Stearyl Alcohol, Cetyl Betaine, Salicylic Acid, Distearyldimonium Chloride, Sodium Lauryl Sulfate, Cetyl Alcohol, Alcohol, Steareth-21, Behenyl Alcohol, PPG-30, Steareth-2, Fragrance, Panthenol, Tocopheryl Acetate, Benzyl Salicylate, Carnosine, Limonene, Butylphenyl Methylpropional, Hexyl Cinnamal, Disodium EDTA, Ascorbic Acid', 'Olay Regenerist Cream Cleanser speeds cells’ natural regeneration in two ways. First, oxygenated derma-beads gently remove dead skin cells. Second, the creamy formula regenerates skin''s surface at the cellular level to detoxify it. Add it to your skin care routine to: \n• Exfoliate to detoxify skin \n• Deep clean and hydrate', 35, NULL, 'Active', 'Inactive', NULL, NULL, 'mint', 'mint', 0, 0, 0, 0),
(81, 'Olay Regenerist Revitalising Cream Cleanser', 2, NULL, '', 'Water, PPG-15 Stearyl Ether, Glycerin, Oxidized Polyethylene, Stearyl Alcohol, Cetyl Betaine, Salicylic Acid, Distearyldimonium Chloride, Sodium Lauryl Sulfate, Cetyl Alcohol, Alcohol, Steareth-21, Behenyl Alcohol, PPG-30, Steareth-2, Fragrance, Panthenol, Tocopheryl Acetate, Benzyl Salicylate, Carnosine, Limonene, Butylphenyl Methylpropional, Hexyl Cinnamal, Disodium EDTA, Ascorbic Acid', 'Olay Regenerist Cream Cleanser speeds cells’ natural regeneration in two ways. First, oxygenated derma-beads gently remove dead skin cells. Second, the creamy formula regenerates skin''s surface at the cellular level to detoxify it. Add it to your skin care routine to: \n• Exfoliate to detoxify skin \n• Deep clean and hydrate', 35, NULL, 'Active', 'Inactive', NULL, NULL, 'mint', 'mint', 0, 0, 0, 0),
(82, 'Olay Total Effects 7 IN ONE Day Cream Touch of Foundation SPF 15', 2, NULL, '', '4% octisalate, 2% avobenzone, 1% octocrylene, 1% ensulizole. also contains: water, glycerin, niacinamide,* dimethicone, titanium dioxide, isopropyl palmitate, aluminum starch octenylsuccinate, behenyl alcohol, sodium ascorbyl phosphate,† panthenol,§ tocopheryl acetate,** amellia sinensis leaf extract, zinc oxide, stearyl alcohol, sorbitan stearate, polyacrylamide, polyethylene, triethanolamine, cetyl alcohol, benzyl alcohol, dimethiconol, peg-100 stearate, c13-14 isoparaffin, laureth-7, cetearyl glucoside, cetearyl alcohol, ammonium polyacrylate, stearic acid, methylparaben, propylparaben, ethylparaben, fragrance, triethoxycaprylylsilane, iron oxides. *vitamin b3 †vitamin c §pro-vitamin b5 **vitamin e', 'Total Effects Touch of Foundation combines 7 anti ageing benefits, SPF 15, plus a touch of sheer foundation for a natural look that evens out skin tone and smoothes out the appearance of wrinkles.\nTotal Effects fights 7 signs of aging by:\nMinimising the appearance of fine lines and wrinkles\nMoisturising to soothe and nourish dry skin\nFirming skin’s appearance with hydration\nFighting dullness and replacing it with a healthy-looking radiance\nSmoothing skin’s texture with gentle exfoliation\nRefining to minimise the appearance of pores\nProtecting skin’s surface from free radical damage with antioxidants Light and Non-Greasy. Dermatologically Tested. Non-Comedogenic (Won’t Clog Pores)', 20, NULL, 'Active', 'Inactive', NULL, NULL, 'mint', 'mint', 0, 0, 0, 0),
(83, 'Olay Regenerist Advance Anti-Ageing Micro-Sculpting Serum', 2, NULL, '', 'Water (N??c), Cyclopentasiloxane, Glycerin, Niacinamide, Aluminum Starch Octenylsuccinate, Dimethicone, Dimethicone Crosspolymer, Panthenol, Polyethylene, Polyacrylamide, Titanium Dioxide, Tocopheryl Acetate, C13-14 Isoparaffin, Mica, DMDM Hydantoin, Allantoin, Laureth-4, Dimethiconol, Laureth-7, Butylene Glycol, Carnosine, Sodium Hyaluronate, Sodium PEG-7 Olive Oil Carboxylate, BHT, Disodium EDTA, PEG-100 Stearate, Peucedanum Graveolens (Dill) Extract, Fragrance (Ch?t t?o h??ng),Citric Acid, Benzyl alcohol, Camellia Sinensis Leaf Extract, Iodopropynyl Butylcarbamate, Butylphenyl Methylpropional, Linalool, Benzyl Salicylate, Hexyl Cinnamal, Xanthan Gum, Limonene, Citronellol, Alpha-Isomethyl Ionone, Palmitoyl Pentapeptide-4.', 'PRODUCT ATTRIBUTES\n- Lightweight so you can use under your facial moisturiser\n- Fast-absorbing\n- Non-greasy', 50, NULL, 'Active', 'Inactive', NULL, NULL, 'mint', 'mint', 0, 0, 0, 0),
(84, 'Olay Total Effects 7 in One Anti-ageing Eye Cream', 2, NULL, '', 'Water, Glycerin, Isohexadecane, Niacinamide, PPG-15 Stearyl Ether, Stearyl Alcohol, Dimethicone, Behenyl Alcohol, Petrolatum, Titanium Dioxide, Polyacrylamide, Cetyl Alcohol, C13-14 Isoparaffin, Panthenol, Tocopheryl Acetate, Steareth-21, Benzyl Alcohol, Mica, Ethylparaben, Laureth-7, Allantoin, Methylparaben, Propylparaben, Disodium EDTA, Dimethiconol, Aloe Barbadensis Leaf Extract, Steareth-2, Zinc Oxide, Magnesium Ascorbyl Phosphate, Isopropyl Titanium Triisostearate, Polyhydroxystearic Acid, Citric Acid, Oleth-3 Phosphate, Camellia Sinensis Leaf Extract, Cucumis Sativus (Cucumber) Fruit Extract, Triethoxycaprylylsilane, Imidazolidinyl Urea, CI 77492, CI 77491', 'Total Effects Eye Cream treats the appearance of signs of aging around the eyes—dark circles, crow’s feet and lines. Its formula combines moisture with a complex of vitamins, minerals, cooling cucumber extract and soothing aloe vera for visibly younger-looking skin above and around the eyes\nTotal Effects fights 7 signs of aging by:\nMinimizing the appearance of fine lines and wrinkles\nReducing the appearance of dark circles\nFighting dullness and replacing it with a healthy-looking radiance\nReducing the appearance of puffiness\nmoisturising to nourish dry skin\nSmoothing skin’s texture with gentle exfoliation\nBalancing color and tone', 45, NULL, 'Active', 'Inactive', NULL, NULL, 'mint', 'mint', 0, 0, 0, 0),
(85, 'Olay Total Effects 7 in One Anti-ageing Eye Cream', 2, NULL, '', 'Water, Glycerin, Isohexadecane, Niacinamide, PPG-15 Stearyl Ether, Stearyl Alcohol, Dimethicone, Behenyl Alcohol, Petrolatum, Titanium Dioxide, Polyacrylamide, Cetyl Alcohol, C13-14 Isoparaffin, Panthenol, Tocopheryl Acetate, Steareth-21, Benzyl Alcohol, Mica, Ethylparaben, Laureth-7', 'Total Effects Eye Cream treats the appearance of signs of aging around the eyes—dark circles, crow’s feet and lines. Its formula combines moisture with a complex of vitamins, minerals, cooling cucumber extract and soothing aloe vera for visibly younger-looking skin above and around the eyes\nTotal Effects fights 7 signs of aging by:\nMinimizing the appearance of fine lines and wrinkles\nReducing the appearance of dark circles\nFighting dullness and replacing it with a healthy-looking radiance\nReducing the appearance of puffiness\nmoisturising to nourish dry skin\nSmoothing skin’s texture with gentle exfoliation\nBalancing color and tone', 45, NULL, 'Active', 'Inactive', NULL, NULL, 'mint', 'mint', 0, 0, 0, 0),
(86, 'Olay Regenerist Micro-sculpting Cream', 2, NULL, '', 'Water, Glycerin, Isohexadecane, Niacinamide, Aluminum Starch Octenylsuccinate, Isopropyl Isostearate, Nylon-12, Dimethicone, Panthenol, Stearyl Alcohol, Polyethylene, Cetyl Alcohol, Behenyl Alcohol, Titanium Dioxide, Benzyl Alcohol, Caprylic/Capric Triglyceride, Sodium Acrylates Copolymer, Tocopheryl Acetate, Mica, Allantoin, Ethylparaben, Methylparaben, Dimethiconol, Polyacrylamide, PEG-100 Stearate, Cetearyl Alcohol', 'Now look younger faster with the new Olay Regenerist Micro-Sculpting Cream. Its unique amino-peptide complex has been enhanced with addition of Olivem that reduces fine lines and wrinkles. It gives you even complexion and keeps your skin moisturised from day one. The new Regenerist formula has also been redesigned so that its anti-ageing ingredients penetrate quicker, giving you faster results. Add it to your skin care routine to:\nReduce lines & wrinkles and smoothen skin’s surface\nProgressively lift and micro-sculpt skin''s appearance in areas prone to sagging with intracellular hydration', 10, NULL, 'Active', 'Inactive', NULL, NULL, 'mint', 'mint', 0, 0, 0, 0),
(91, 'cdvdv', 2, NULL, '', 'cz cz', 'cdds', 1, NULL, 'Active', 'Inactive', NULL, NULL, 'mint', 'mint', 0, 0, 0, 0),
(88, 'Olay Regenerist Revitalising Hydration Cream SPF 15', 2, NULL, '', 'Water, Glycerin, Niacinamide, Ethylhexyl Salicylate, Butyl Methoxydibenzoylmethane, Dimethicone, Isopropyl Isostearate, Octocrylene, Panthenol, Phenylbenzimidazole Sulfonic Acid', 'PRODUCT ATTRIBUTES\n- Rich, non-greasy formula\n\nTECHNOLOGY\nFormula with Amino-peptide Complex helps renew skin''s surface layers with SPF15 UVA/UVB protection.', 20, NULL, 'Active', 'Inactive', NULL, NULL, 'mint', 'mint', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `userEmail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `userPass` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `userStatus` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `tokenCode` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `gender` text COLLATE utf8_unicode_ci,
  `dob` text COLLATE utf8_unicode_ci,
  `pin` float DEFAULT NULL,
  `city` text COLLATE utf8_unicode_ci,
  `country` text COLLATE utf8_unicode_ci,
  `phone` double DEFAULT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `userEmail` (`userEmail`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userID`, `userName`, `userEmail`, `userPass`, `userStatus`, `tokenCode`, `address`, `gender`, `dob`, `pin`, `city`, `country`, `phone`) VALUES
(7, 'Aditya Chawla', 'chawlaaditya8@gmail.com', 'e0a8aa81eb1762d529783cf587f6f422', 'Y', '6942233d0e3640c8ec49271e481edff4', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'mint', 'chawlaaditya7@gmail.com', 'asew', 'Y', '3fd75f5133d5526d7a485c0ddb6feea9', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Aksha Rakra', 'aksharakra@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Y', '0b311ef99b76a6bbad2de5c88a020bb4', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'tehseeldar', 'terekonhibtaunga@terbaap.com', '0421008445828ceb46f496700a5fa65e', 'Y', 'ca3a2a09e673e362306792586633e535', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Aditya Chawla', 'htiwarih@gmail.com', 'password', 'Y', '2655e30f9f570c599a9ca933a6757989', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
