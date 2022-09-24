-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2022 at 07:00 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smarakam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` varchar(10) NOT NULL,
  `a_name` varchar(30) DEFAULT NULL,
  `a_email` varchar(30) DEFAULT NULL,
  `a_pwd` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_email`, `a_pwd`) VALUES
('A19112000', 'Mukul Mahajan', 'mukulmahajan2000@gmail.com', 'Mukul@123');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `b_id` varchar(10) NOT NULL,
  `m_id` varchar(10) NOT NULL,
  `u_id` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `no_of_heads` int(2) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`b_id`, `m_id`, `u_id`, `date`, `no_of_heads`, `status`) VALUES
('B28068081', 'M11246580', 'U66277640', '2022-05-04', 3, 0),
('B39954941', 'M59048421', 'U66277640', '2022-05-06', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `monument`
--

CREATE TABLE `monument` (
  `m_id` varchar(10) NOT NULL,
  `m_name` varchar(70) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `address` varchar(70) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `opening_time` time DEFAULT NULL,
  `closing_time` time DEFAULT NULL,
  `slots_per_day` int(5) DEFAULT NULL,
  `img_count` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `monument`
--

INSERT INTO `monument` (`m_id`, `m_name`, `description`, `address`, `city`, `state`, `opening_time`, `closing_time`, `slots_per_day`, `img_count`) VALUES
('M11246580', 'Taj Mahal', 'The Taj Mahal is located on the right bank of the Yamuna River in a vast Mughal garden that encompasses nearly 17 hectares, in the Agra District in Uttar Pradesh. It was built by Mughal Emperor Shah Jahan in memory of his wife Mumtaz Mahal with construction starting in 1632 AD and completed in 1648 AD, with the mosque, the guest house and the main gateway on the south, the outer courtyard and its cloisters were added subsequently and completed in 1653 AD. The existence of several historical and Quaranic inscriptions in Arabic script have facilitated setting the chronology of Taj Mahal. For its construction, masons, stone-cutters, inlayers, carvers, painters, calligraphers, dome builders and other artisans were requisitioned from the whole of the empire and also from the Central Asia and Iran. Ustad-Ahmad Lahori was the main architect of the Taj Mahal.\r\n\r\nThe Taj Mahal is considered to be the greatest architectural achievement in the whole range of Indo-Islamic architecture. Its recognised architectonic beauty has a rhythmic combination of solids and voids, concave and convex and light shadow; such as arches and domes further increases the aesthetic aspect. The colour combination of lush green scape reddish pathway and blue sky over it show cases the monument in ever changing tints and moods. The relief work in marble and inlay with precious and semi precious stones make it a monument apart. The four free-standing minarets at the corners of the platform added a hitherto unknown dimension to the Mughal architecture. The four minarets provide not only a kind of spatial reference to the monument but also give a three dimensional effect to the edifice.', 'Old city, Shahjahanabad, Agra', 'Agra', 'Uttar Pradesh', '09:00:00', '18:00:00', 10000, 6),
('M59048421', 'Gwalior Fort', 'Gwalior Fort, situated on top of a hill, finds its place among the best fortresses of India. It is also considered to be one of the most impenetrable forts in the country. Known for its great architecture and rich past, Gwalior Fort is a must-visit attraction when visiting Central India. Read about the history of the fort here, and find out what makes it such a wonder.According to historians, there isnt any concrete proof to indicate exactly when the fort was constructed. However, a local legend tells us that it was built in 3 CE by a local king called Suraj Sen. A saint named Gwalipa came wandering to the fort and met the king, who was suffering from leprosy. When Gwalipa offered him some water from a sacred pond (now called Suraj Kund and located within the fort complex), he immediately became healthy again. As a thankful gesture to the saint, the king named the fort and the town after him. The saint then gave the king the title of Pal (protector) and told him that as long as he and his family continue to bear this title, the fort would remain in their possession. Following this, 83 successors of Suraj Sen controlled the fort. But the 84th king, Tej Karan, did not bear the title and lost the fort.\r\nAfter being attacked and ruled by a couple of Muslim dynasties for three centuries, the Tomars captured the fort in 1398. Maan Singh was the last and the most distinguished Tomar ruler, and he constructed several monuments inside the fort complex. The beautiful turquoise blue-tiled Man Mandir Palace was built during his reign. And he also had a separate palace built for his wife Mrignayani; this structure is called the Gujari Mahal and is now a state archaeological museum. When Ibrahim Lodi attacked the fort in 1516, he defeated Maan Singh, who died, and the Tomars lost the fort.', 'Old Hill valley, Chandan Nagar, Gwalior ', 'Gwalior', 'Madhya Pradesh', '10:00:00', '18:00:00', 1000, 5),
('M63399836', 'Lotus Temple ', 'The Lotus Temple (also known as Kamal Mandir)  in Delhi is a matchless architectural marvel and one of the prime tourist attractions of the National Capital. Shaped in the form of a spectacular lotus with white petals, it makes for a break-taking sight and attracts countless visitors throughout the year. Unlike most other places of worship, this temple or Bahai House of Worship does not allow ritualistic ceremonies and has no fixed pattern to conduct worship. A glorious symbol of oneness, this place of worship must be on your itinerary when planning a trip and booking your hotels in Delhi.\r\nSurrounded by lush green landscaped gardens, this lotus-inspired structure spreads across 26 acres of land. Made using white marble sourced from Greece, it comprises of 27 petals in the free-standing state. These petals are organized in groups of three to lend the structure a nine-sided circular shape, as has been indicated in the Bahai scripture. There are nine entrances that open to a huge central hall, which is about 40 meters in height. The temple has a seating capacity of 1300 people and can accommodate 2500 people at a time.   \r\n\r\nThere are no altars or pulpits inside the Lotus Temple, which is a common feature of all Bahai Houses of Worship. The interiors are devoid of any statues, pictures, or image as well. An eye-catching feature of the temple is the nine pools of water located around the petals. They give the impression of a half-bloomed lotus in a water body and the whole structure looks spectacular when illuminated in the night.       \r\n\r\nThis temple was designed by Fariborz Sahba, an Iranian-American architect while the structural design was done by Flint and Neill, a UK firm. Larsen & Toubro Limiteds ECC Construction Group undertook the construction work of the temple and completed it at a cost of 10 million dollars.', 'New Civil LInes street, Vasant Vihar, Delhi', 'Delhi', 'Uttar Pradesh', '08:00:00', '19:00:00', 800, 3),
('M80283522', 'Sanchi Stupa', 'Great Stupa, the most noteworthy of the structures at the historic site of Sanchi in Madhya Pradesh state, India. It is one of the oldest Buddhist monuments in the country and the largest stupa at the site\r\nThe Great Stupa (also called stupa no. 1) was originally built in the 3rd century BCE by the Mauryan emperor Ashoka and is believed to house ashes of the Buddha. The simple structure was damaged at some point during the 2nd century BCE. It was later repaired and enlarged, and elements were added; it reached its final form in the 1st century BCE. The building is 120 feet (37 metres) wide and 54 feet (17 metres) high.\r\nThe central structure consists of a hemispherical dome (anda) on a base, with a relic chamber deep within. The dome symbolizes, among other things, the dome of heaven enclosing the earth. It is surmounted by a squared railing (harmika) that can be said to represent the world mountain. A central pillar (yashti) symbolizes the cosmic axis and supports a triple umbrella structure (chattra), which is held to represent the Three Jewels of Buddhism—the Buddha, the dharma (doctrine), and the sangha (community). A circular terrace (medhi), enclosed by a railing, surrounds the dome, on which the faithful are to circumambulate in a clockwise direction. The entire structure is enclosed by a low wall (vedika), which is punctuated at the four cardinal points by toranas (ceremonial gateways). The toranas of the Great Stupa are the crowning achievement of Sanchi sculpture. Each gateway is made up of two squared posts topped by capitals of sculptured animals or dwarfs, surmounted by three architraves.', 'Hill road, Green farms, Sanchi, Vidisha', 'Sanchi', 'Madhya Pradesh', '09:00:00', '19:00:00', 500, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_detail`
--

CREATE TABLE `ticket_detail` (
  `b_id` varchar(10) NOT NULL,
  `visitor_name` varchar(30) NOT NULL,
  `age` int(2) NOT NULL,
  `gender` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket_detail`
--

INSERT INTO `ticket_detail` (`b_id`, `visitor_name`, `age`, `gender`) VALUES
('B28068081', 'Kriti', 20, 'F'),
('B28068081', 'Harsh', 20, 'M'),
('B28068081', 'Mukul', 21, 'M'),
('B39954941', 'Vikram Dubey', 28, 'M'),
('B39954941', 'Arpita Dubey', 27, 'F');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` varchar(10) NOT NULL,
  `u_name` varchar(30) DEFAULT NULL,
  `u_phone` varchar(12) DEFAULT NULL,
  `u_email` varchar(40) DEFAULT NULL,
  `u_pwd` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_phone`, `u_email`, `u_pwd`) VALUES
('U25951553', 'Virat Kohli', '8987676545', 'viratkohli123@gmail.com', '72400b9eddd360602c2815933308cf68c1b3e655'),
('U36891944', 'Gayatri Singh', '8976456745', 'gayatrisingh123@gmail.com', '34ba2c217c9d6389a7c45b56d880b579df70430c'),
('U66277640', 'Kriti Namdeo', '9878978654', 'kritinamdeo123@gmail.com', '00f1ac1f1e1e564dd8b829f99995d639b04f7d8f'),
('U80014033', 'Harsh Namdeo', '7756543431', 'harshnamdeo123@gmail.com', '9efceeb54b8471f01e6bae7b78160c2dc2da6f0b');

-- --------------------------------------------------------

--
-- Table structure for table `validator`
--

CREATE TABLE `validator` (
  `v_id` varchar(10) NOT NULL,
  `v_name` varchar(30) DEFAULT NULL,
  `v_email` varchar(50) DEFAULT NULL,
  `v_pwd` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `validator`
--

INSERT INTO `validator` (`v_id`, `v_name`, `v_email`, `v_pwd`) VALUES
('V11267236', 'Kartik Sharma', 'kartiksharma@gmail.com', 'edb82e2ee17b34ac5ad729571b98c064ab2829fe'),
('V31987777', 'Khushi Verma', 'khushisharma@gmail.com', 'b3bb6582947d5be87fd795bc09a9f35938cb77b1'),
('V4858465', 'Ganesh Kumar', 'ganeshkumar@gmail.com', '083def488f3a726cace5741f094b7de93d89d314');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`),
  ADD UNIQUE KEY `a_email` (`a_email`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `m_id` (`m_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `monument`
--
ALTER TABLE `monument`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `ticket_detail`
--
ALTER TABLE `ticket_detail`
  ADD KEY `b_id` (`b_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `u_phone` (`u_phone`),
  ADD UNIQUE KEY `u_email` (`u_email`);

--
-- Indexes for table `validator`
--
ALTER TABLE `validator`
  ADD PRIMARY KEY (`v_id`),
  ADD UNIQUE KEY `v_email` (`v_email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`m_id`) REFERENCES `monument` (`m_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`);

--
-- Constraints for table `ticket_detail`
--
ALTER TABLE `ticket_detail`
  ADD CONSTRAINT `ticket_detail_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `booking` (`b_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
