-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 28, 2016 at 06:09 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `alerts`
--

-- --------------------------------------------------------

--
-- Table structure for table `alerts`
--

CREATE TABLE IF NOT EXISTS `alerts` (
  `id` int(11) NOT NULL,
  `incident` varchar(45) DEFAULT NULL,
  `offcampus` tinyint(1) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  `time_one` varchar(45) DEFAULT NULL,
  `time_two` varchar(45) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `case` varchar(45) DEFAULT NULL,
  `description` longtext
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alerts`
--

INSERT INTO `alerts` (`id`, `incident`, `offcampus`, `date`, `time_one`, `time_two`, `location`, `case`, `description`) VALUES
(28, 'Robbery', 1, 'March 5, 2016', '1:50 a.m.', '', '4400 block of Knox Road, College Park, MD', 'PP16030500000219', 'On March 5, 2016, at approximately 5:50 a.m., UMPD was notified by the Prince Georgeâ€™s County Police Department of an off-campus robbery. Two male UMD students reported to police that one was assaulted and his property was taken. There were two suspects, both males.'),
(29, 'Rape/Burglary', 1, 'March 5, 2016', '5:30 a.m.', '', '4500 block of Fordham Lane, College Park, MD', 'PP16030500000394', 'On March 5, 2016, at approximately 5:54 a.m., UMPD was notified by the Prince Georgeâ€™s County Police Department of an off-campus rape/burglary. A female reported to police that at approximately 5:30 a.m., she was sleeping in her bed when she realized that she was being sexually penetrated. Thinking it was her boyfriend, she said his name, but got no answer. She then reached for his hair and noticed it was not her boyfriend in the bed. The female made a noise and the male suspect got out of bed and left the apartment.    The door to the apartment building and apartment were unlocked. The suspect is described as a male, who was wearing a dark hoodie with dark pants.'),
(30, 'Burglaries', 1, 'March 1, 2016', '12:01 a.m.', '12:54 a.m.', '4500 block of College Ave., College Park, MD', 'PP16030100000074', 'On March 1, 2016, at approximately 3:12 a.m., the University of Maryland Police Department was notified by the Prince Georgeâ€™s County Police Department of two off-campus burglaries. Two male UMD students returned back to their apartments and noticed property missing. Both apartments were left unsecured.    The suspect is described as a white male, short brown hair, approximately 5''6" and 160 lbs., wearing a white long sleeved collared shirt and blue jeans.'),
(31, 'Burglary', 1, 'February 28, 2016', '3:00 a.m.', '8:00 a.m.', '4600 block of Knox Road, College Park, MD', 'PP16022800000921', 'On February 28, 2016, at approximately 11:56 a.m., the University of Maryland Police Department were notified by the Prince Georgeâ€™s County Police Department of an off-campus burglary. Two male UMD students reported that sometime after returning home around 3:00 a.m., property was taken from the residence.  It is unknown if the residence was secured while the students were sleeping.'),
(32, 'Residential Burglary', 1, 'February 23, 2016 ', '11:30 p.m.', '', '4200 Block of Guilford Road, College Park, MD', 'PP16022400000368', 'At 7:45 a.m. this morning (February 24, 2016), the Prince Georgeâ€™s County Police Department was notified of an off campus residential burglary that occurred last night at 11:30 p.m. (February 23, 2016). The victims told officers that a male entered their apartment through a rear door which may have been left unlocked.  The male attempted to take personal property of one of the residents but fled when she screamed.  No one was injured.'),
(33, 'Burglary', 0, 'February 23, 2016', '10:30 p.m.', '11p.m.', 'Graduate Hills Apartments', '2016-10573 (May be incorrect)', 'On February 23, 2016, at approximately 11:02 p.m., the University of Maryland Police Department (UMPD) were notified of a burglary. UMPD responded to the 3400 block of Tulane Drive for a report of a burglary that occurred between 10:30 p.m. and 11 p.m. A male UMD student reported to police that while in the shower, he heard strange noises coming from the living room. The student went to check it out and noticed that his kitchen window was closed which was previously left open. The student then checked his front door and found it unlocked. The student checked around his apartment and noticed some of his property gone. While searching the exterior of the building, a window screen was found damaged.  No injuries reported.'),
(34, 'Indecent Exposure', 0, 'February 23, 2016', '7:45 p.m.', '', '7th Floor of McKeldin Library / Menâ€™s Restr', '2016-10573', 'On February 23, 2016, at approximately 8:10 p.m., the University of Maryland Police Department received a call for an indecent exposure at McKeldin Library that occurred at 7:45 p.m.. A male UMD student reported that a male who was in a bathroom stall beside him, exposed his genitals below the stall divider. The victim shouted causing the male to flee from the area.'),
(35, 'Armed Robbery', 0, 'February 21, 2016', '8:15 p.m.', '', 'Montgomery Hall', '2016-10405', 'On February 22, 2016, at approximately 9:06 p.m., the University of Maryland Police Department met with six UMD students, for a report of an armed robbery. The students were inside a residence hall room the previous night on February 21, 2016, at approximately 8:15 p.m., when one of the students heard a knock at the door. The student answered the door and a male asked the student if he knew an individual. The student then advised that he did not know the person.  At that time, the suspect forced his way into the room and displayed a handgun.  During this time, a second male suspect entered the room and property was demanded. The suspects took the victimsâ€™ property and left.   No one was injured.'),
(36, 'Commercial Robbery (Weapon Implied)', 1, 'February 18, 2016', '5:01 a.m.', '', '7300 Baltimore Avenue, College Park, MD (CVS)', 'PP16021800000274', 'Details  On February 18, 2016, at approximately 5:06 a.m., the University of Maryland Police Department (UMPD) was notified of an off-campus commercial robbery. The Prince Georgeâ€™s County Police Department and UMPD responded to 7300 Baltimore Avenue to investigate further.  Four males entered the store, demanded money while implying they were armed. The suspects left the store with the money.'),
(37, 'Indecent Exposure', 0, 'February 17, 2016', '6:50 p.m.', '', '7th Floor of McKeldin Library', '2016-9371', 'On February 17, 2016, at approximately 6:57 p.m., the University of Maryland Police Department (UMPD) received a call for an indecent exposure at McKeldin Library. A female UMD student reported that a male who was at a desk near her, exposed his genital and began to arouse himself. Officers searched the area, but were unable to locate the suspect.      The suspect is described as a male, approximately 40 years of age, facial hair, wearing a red knit hat and a black jacket.'),
(38, 'Assault with a Weapon', 1, 'February 12, 2016 ', '8 p.m.', '8:04 p.m.', '8300 Block of Baltimore Ave., College Park, M', 'PP16021200001767', 'On February 12, 2016, at approximately 8:15 p.m., the University of Maryland Police Department (UMPD) was notified of an assault involving a weapon that occurred at a commercial establishment in the 8300 block of Baltimore Avenue. The Prince Georgeâ€™s County Police Department and UMPD responded to the location listed above for an assault involving a knife. Officers arrived on scene and located a male who was wounded. The male was taken to a local area hospital for further evaluation. The suspects fled on foot north on Baltimore Avenue. Officers searched the area, but were unable to locate the suspects.'),
(39, 'Commercial Armed Robbery', 1, 'February 5, 2016 ', '2:45 p.m.', '', '7201 Baltimore Avenue, College Park, MD', 'PP16020500001058', 'On February 5, 2016, at approximately 2:45 p.m., the Prince Georgeâ€™s County Police Department and the University of Maryland Police Department responded to 7201 Baltimore Avenue for an off-campus commercial armed robbery. Two male suspects armed with handguns, entered the store, took property and left. The suspects were last seen leaving in a vehicle, driving East on Guilford Road towards the College Park Metro station. Officers searched the area, but were unable to locate the suspects.'),
(40, 'Commercial Armed Robbery', 1, 'January 24, 2016', '5:05 a.m.', '', '8100 block of Baltimore Avenue, College Park,', 'PP16012400000100', 'On January 24, 2016, the Prince Georgeâ€™s County Police Department responded to the 8100 block of Baltimore Avenue for a report of a commercial armed robbery that occurred at approximately 5:05 a.m.'),
(41, 'Residential Burglary', 1, 'January 8, 2016', '8:30 p.m.', '', '8500 block of Potomac Ave., College Park, MD', '16-008-2656', 'On January 8, 2015, at approximately 8:35 p.m., the Prince Georgeâ€™s County Police Department responded to the 8500 block of Potomac Avenue for a report of a burglary. A UMD student entered the residence when an unknown suspect was observed leaving though an unsecured window at the back of the residence. Property was taken.'),
(43, 'Residential Burglary', 1, 'December 19, 2015', '5:15 a.m.', '5:20 a.m.', '7500 Block of Rhode Island Ave., College Park', '15-353-0564', 'On December 19, 2015, at approximately 5:20 a.m., the Prince Georgeâ€™s County Police Department responded to the 7500 block of Rhode Island Avenue for a report of a burglary. A female UMD student reported to police that she was sleeping when she woke up to a suspect in her room holding her property. The victim screamed and the suspect ran out of the house with the victimâ€™s property. It appears the suspect may have entered through an unsecured exterior door.      Officers searched the area, but were unable to locate the suspect.'),
(44, 'Residential Burglary', 1, 'December 19, 2015', '2:38 a.m.', '', '4600 Block of Harvard Road, College Park, MD', '15-353-0340', 'On December 19, 2015, at approximately 2:38 a.m., the Prince Georgeâ€™s County Police Department responded to the 4600 block of Harvard Road for a report of a burglary. A female was sleeping in her room, when she woke up to a male standing over her. The victim asked who the male was and he identified himself. The suspect left before police arrived. It was reported the suspect entered the residence through an unlocked door and may have been intoxicated at the time of the incident.     At this time, it appears nothing was taken from the residence.'),
(45, 'Burglary', 1, 'December 10, 2015 ', '3:00 a.m.', '', '4500 Block of College Avenue, College Park, M', '15-344-1373', 'On December 10, 2015, at approximately 2:30 p.m., the University of Maryland Police Department (UMPD) was notified by the Prince Georgeâ€™s County Police Department (PGPD) of an off-campus burglary. A female UMD student was sleeping in her apartment, when a suspect entered her room, shining a light on her. The victim woke up and the suspect ran out of the room. It was reported that the suspect entered through an unlocked door.'),
(46, 'Residential Burglary', 1, 'December 19-23, 2015', '', NULL, '4800 Block Norwich Road, College Park, MD', '15-356-1400', 'On December 22, 2015 and December 23, 2016, officers from the Prince George’s County Police Department responded to four reports of burglary that occurred in College Park near the University of Maryland campus.  In three of the cases, unknown perpetrators entered the residences through unsecured rear windows.  In one case, access was made to the house by breaking a rear window.  Several items of value were stolen from each location, which were unoccupied during the time of the incidents. '),
(47, 'Residential Burglary', 1, 'December 21-22, 2015', NULL, NULL, '5000 Block Norwich Road, College Park, MD', '15-357-1570', 'On December 22, 2015 and December 23, 2016, officers from the Prince George’s County Police Department responded to four reports of burglary that occurred in College Park near the University of Maryland campus.  In three of the cases, unknown perpetrators entered the residences through unsecured rear windows.  In one case, access was made to the house by breaking a rear window.  Several items of value were stolen from each location, which were unoccupied during the time of the incidents. '),
(48, 'Residential Burglary', 1, 'December 22-23, 2015', NULL, NULL, '7500 Block Dartmouth Road, College Park, MD', '15-357-2223', 'On December 22, 2015 and December 23, 2016, officers from the Prince George’s County Police Department responded to four reports of burglary that occurred in College Park near the University of Maryland campus.  In three of the cases, unknown perpetrators entered the residences through unsecured rear windows.  In one case, access was made to the house by breaking a rear window.  Several items of value were stolen from each location, which were unoccupied during the time of the incidents. '),
(49, 'Residential Burglary', 1, 'December 23, 2015', '12:00 p.m.', '1:30 p.m.', '8300 Block Potomac Avenue, College Park, MD', '15-357-2651', 'On December 22, 2015 and December 23, 2016, officers from the Prince George’s County Police Department responded to four reports of burglary that occurred in College Park near the University of Maryland campus.  In three of the cases, unknown perpetrators entered the residences through unsecured rear windows.  In one case, access was made to the house by breaking a rear window.  Several items of value were stolen from each location, which were unoccupied during the time of the incidents. '),
(50, 'Burglary', 1, 'March 27, 2016', '10:00 p.m.', '', '7300 block of Princeton Ave., College Park, M', 'PP16032700001824', 'Details  On March 27, 2016, at approximately 10:19 p.m., the University of Maryland Police Department (UMPD) was notified by the Prince Georgeâ€™s County Police Department of an off-campus burglary. A male UMD student reported that a suspect had entered his residence while he was home. The suspect left the residence when approached by the victim.'),
(51, 'Burglary', 1, 'March 26, 2016', '1:20 a.m.', '', '7500 block of Rhode Island Ave., College Park', 'PP16032600000035', 'Details  On March 26, 2016, at approximately 1:31 a.m., the University of Maryland Police Department (UMPD) was notified by the Prince Georgeâ€™s County Police Department of an off-campus burglary. A female UMD student reported she heard noises coming from another location from within the residence. The victim walked around and saw a suspect inside the common area of the residence. The suspect then left the residence.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alerts`
--
ALTER TABLE `alerts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `case` (`case`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alerts`
--
ALTER TABLE `alerts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
