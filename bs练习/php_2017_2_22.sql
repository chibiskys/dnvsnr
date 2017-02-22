/*
SQLyog Ultimate v11.11 (32 bit)
MySQL - 5.5.40 : Database - php
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`php` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `php`;

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `cat_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(300) NOT NULL,
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `category` */

insert  into `category`(`cat_id`,`cat_name`,`pid`) values (1,'电子商务',0),(4,'计算机',0),(12,'新闻',0),(11,'互联网',0),(14,'体育',0);

/*Table structure for table `comment` */

DROP TABLE IF EXISTS `comment`;

CREATE TABLE `comment` (
  `comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `comment_time` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `is_show` int(11) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `comment` */

insert  into `comment`(`comment_id`,`content`,`comment_time`,`member_id`,`message_id`,`is_show`) values (1,'fandy的评论一...',1487750098,9,78,1),(2,'fandy的评论二...',1487750104,9,78,1),(3,'fandy的评论三...',1487750111,9,78,1),(4,'fandy的评论四...',1487753413,9,78,1),(5,'fandy的评论五...',1487753433,9,78,1),(6,'fandy的评论六...',1487753441,9,78,1),(7,'哦靠...不是吧',1487753768,9,74,1);

/*Table structure for table `member` */

DROP TABLE IF EXISTS `member`;

CREATE TABLE `member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(60) NOT NULL,
  `userpwd` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `member` */

insert  into `member`(`id`,`username`,`userpwd`) values (9,'fandy','welcome'),(13,'chibisky','7758520wzl'),(12,'sgsg','sggs');

/*Table structure for table `message` */

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `message_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `addtime` int(11) NOT NULL,
  `img` varchar(200) NOT NULL,
  `cat_id` int(11) NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;

/*Data for the table `message` */

insert  into `message`(`message_id`,`title`,`content`,`addtime`,`img`,`cat_id`) values (50,'港股大涨后，还有什么投资机会？','港股大涨后，还有什么投资机会？港股大涨后，还有什么投资机会？港股大涨后，还有什么投资机会？',1486778512,'',12),(4,'习近平同美国总统特朗普通电话','习近平同美国总统特朗普通电话习近平同美国总统特朗普通电话',1486778512,'',12),(5,'李克强为何把清理涉企收费提到如此高度','李克强为何把清理涉企收费提到如此高度李克强为何把清理涉企收费提到如此高度',1486778512,'',12),(6,'中美军机被指在南海上空接近 仅相距305米','中美军机被指在南海上空接近 仅相距305米中美军机被指在南海上空接近 仅相距305米',1486778512,'',12),(7,'公安部：城区常住人口300万以下城市不得积分落户','公安部：城区常住人口300万以下城市不得积分落户公安部：城区常住人口300万以下城市不得积分落户',1486778512,'',12),(8,'滞留印度54年老兵计划今日回国：最想吃家乡手擀面','滞留印度54年老兵计划今日回国：最想吃家乡手擀面滞留印度54年老兵计划今日回国：最想吃家乡手擀面',1486778512,'',12),(9,'18大后20名省部级干部被降级 最重从副省级变科员','18大后20名省部级干部被降级 最重从副省级变科员18大后20名省部级干部被降级 最重从副省级变科员',1486778512,'',12),(10,'四川：男性公民满18周岁都必须兵役登记','四川：男性公民满18周岁都必须兵役登记四川：男性公民满18周岁都必须兵役登记',1486778512,'',12),(11,'国土部：城里人不能够到农村买卖宅基地','国土部：城里人不能够到农村买卖宅基地国土部：城里人不能够到农村买卖宅基地',1486778512,'',11),(12,'钢铁工人分流竞聘做保安 收入下滑近七成','钢铁工人分流竞聘做保安 收入下滑近七成钢铁工人分流竞聘做保安 收入下滑近七成',1486778512,'',11),(13,'行贿44万被曝光，华谊兄弟王中军该负什么责任？','行贿44万被曝光，华谊兄弟王中军该负什么责任？行贿44万被曝光，华谊兄弟王中军该负什么责任？',1486778512,'',11),(14,'北汽自有品牌销量雪崩 1月份仅卖出30辆轿车','北汽自有品牌销量雪崩 1月份仅卖出30辆轿车北汽自有品牌销量雪崩 1月份仅卖出30辆轿车',1486778512,'',11),(15,'雷军说要开1000家小米之家时 就知道小米更悬了','雷军说要开1000家小米之家时 就知道小米更悬了雷军说要开1000家小米之家时 就知道小米更悬了',1486778512,'',11),(51,'习近平向德国当选总统施泰因迈尔致贺电','习近平向德国当选总统施泰因迈尔致贺电习近平向德国当选总统施泰因迈尔致贺电',1486949749,'',12),(28,'两人偷一篮鸡蛋被判两年？篮子里藏着3万元ddd','两人偷一篮鸡蛋被判两年？篮子里藏着3万元两人偷一篮鸡蛋被判两年？篮子里藏着3万元ddd2',1486781603,'',11),(29,'演员发微博曝大量垃圾倾倒怒江 当地官方启动问责','演员发微博曝大量垃圾倾倒怒江 当地官方启动问责演员发微博曝大量垃圾倾倒怒江 当地官方启动问责',1486781611,'',1),(30,'女童输液吃包子致呼吸道梗阻死亡 卫生局：等尸检','女童输液吃包子致呼吸道梗阻死亡 卫生局：等尸检女童输液吃包子致呼吸道梗阻死亡 卫生局：等尸检',1487744303,'',12),(34,'韩国口蹄疫蔓延 代总统称或动用军队控制疫情','韩国口蹄疫蔓延 代总统称或动用军队控制疫情韩国口蹄疫蔓延 代总统称或动用军队控制疫情',1486783472,'',4),(35,'美国出了个斯诺登2.0：私藏50TB机密文件和数据','美国出了个斯诺登2.0：私藏50TB机密文件和数据美国出了个斯诺登2.0：私藏50TB机密文件和数据',1486783486,'',4),(37,'曾创14个涨停的“妖股最近歇菜了2.5亿主力资金撤离','曾创14个涨停的“妖股最近歇菜了2.5亿主力资金撤离曾创14个涨停的“妖股最近歇菜了2.5亿主力资金撤离',1486783665,'',4),(38,'沪指涨0.42%盘中突破3200 钢铁板块领涨','沪指涨0.42%盘中突破3200 钢铁板块领涨沪指涨0.42%盘中突破3200 钢铁板块领涨',1486789633,'',4),(39,'沪指涨0.42%盘中突破3200 钢铁板块领涨','沪指涨0.42%盘中突破3200 钢铁板块领涨沪指涨0.42%盘中突破3200 钢铁板块领涨',1486789636,'',4),(44,'CBA季后赛形势：5队争两张门票 两大冠军豪门危险','CBA季后赛形势：5队争两张门票 两大冠军豪门危险CBA季后赛形势：5队争两张门票 两大冠军豪门危险',1486794577,'',4),(43,'抬价手段？中国足球留洋陷围城 新政造归国潮','抬价手段？中国足球留洋陷围城 新政造归国潮抬价手段？中国足球留洋陷围城 新政造归国潮',1486794557,'',4),(52,'斯诺登：“不惧怕”被俄罗斯引渡回美国','斯诺登：“不惧怕”被俄罗斯引渡回美国斯诺登：“不惧怕”被俄罗斯引渡回美国',1486949782,'',1),(53,'总理批示 18部委通力破除回国留学生创业壁垒','总理批示 18部委通力破除回国留学生创业壁垒总理批示 18部委通力破除回国留学生创业壁垒',1486953852,'',1),(54,'江苏一货轮在印度被扣押 23名船员被困一个多月','江苏一货轮在印度被扣押 23名船员被困一个多月江苏一货轮在印度被扣押 23名船员被困一个多月',1486953862,'',1),(55,'德国汉堡机场68人吸入不明气体受伤 已排除恐袭','德国汉堡机场68人吸入不明气体受伤 已排除恐袭德国汉堡机场68人吸入不明气体受伤 已排除恐袭',1486954116,'',4),(56,'美日韩呼吁召开紧急会议 称朝发射导弹系挑战特朗普','美日韩呼吁召开紧急会议 称朝发射导弹系挑战特朗普美日韩呼吁召开紧急会议 称朝发射导弹系挑战特朗普',1487744288,'',12),(58,'2017年房价终于要跌了？这要看房地产税何时推出','2017年房价终于要跌了？这要看房地产税何时推出2017年房价终于要跌了？这要看房地产税何时推出',1487744275,'',12),(59,'得知“红颜知己”遭家暴 男子砸了她丈夫2辆车','得知“红颜知己”遭家暴 男子砸了她丈夫2辆车得知“红颜知己”遭家暴 男子砸了她丈夫2辆车',1487744266,'',12),(60,'陕西少年公交上指认小偷遭群殴 4名疑犯全部落网','陕西少年公交上指认小偷遭群殴 4名疑犯全部落网陕西少年公交上指认小偷遭群殴 4名疑犯全部落网',1487744231,'',12),(61,'男子出轨被手机“出卖” 状告打车软件索赔巨款','男子出轨被手机“出卖” 状告打车软件索赔巨款',1487744221,'',12),(62,'揭秘“色播”江湖：尺度惊人00后凌晨看直播刷跑车','揭秘“色播”江湖：尺度惊人00后凌晨看直播刷跑车揭秘“色播”江湖：尺度惊人00后凌晨看直播刷跑车',1487744210,'',11),(64,'陕西少年公交上指认小偷遭群殴 4名疑犯全部落网','陕西少年公交上指认小偷遭群殴 4名疑犯全部落网陕西少年公交上指认小偷遭群殴 4名疑犯全部落网',1487744196,'',12),(65,'成都地铁&quot;公鸡下蛋&quot;广告遭停播 被市民投诉太低俗','成都地铁&quot;公鸡下蛋&quot;广告遭停播 被市民投诉太低俗成都地铁&quot;公鸡下蛋&quot;广告遭停播 被市民投诉太低俗2',1487744182,'',12),(66,'得知“红颜知己”遭家暴 男子砸了她丈夫2辆车','得知“红颜知己”遭家暴 男子砸了她丈夫2辆车得知“红颜知己”遭家暴 男子砸了她丈夫2辆车',1487744170,'',12),(68,'武汉：33名“老赖”在看守所度过鸡年春节','武汉：33名“老赖”在看守所度过鸡年春节武汉：33名“老赖”在看守所度过鸡年春节',1487744155,'',14),(70,'武汉速度赛马公开赛开锣 人欢马嘶闹新春(图)','武汉速度赛马公开赛开锣 人欢马嘶闹新春(图)武汉速度赛马公开赛开锣 人欢马嘶闹新春(图)',1487744144,'',12),(71,'外媒称中国欲造“美国化”航母 两艘派驻南海','外媒称中国欲造“美国化”航母 两艘派驻南海外媒称中国欲造“美国化”航母 两艘派驻南海',1487744132,'1487079192656.jpg',12),(72,'《环球时报》专访黄洁夫：卫生部前高官细述中国器官移植','《环球时报》专访黄洁夫：卫生部前高官细述中国器官移植《环球时报》专访黄洁夫：卫生部前高官细述中国器官移植',1487744121,'20170215041612195.jpg',12),(73,'云南镇雄回应“返乡男子称遭强行结扎”：已获其同意，没殴打','云南镇雄回应“返乡男子称遭强行结扎”：已获其同意，没殴打云南镇雄回应“返乡男子称遭强行结扎”：已获其同意，没殴打',1487744110,'1487118352919.jpg',12),(74,'3000多名中国实习生在日本诡异“失踪” 竟曝出惊人内幕','&lt;div class=&quot;img_wrapper&quot; style=&quot;text-align:center;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;font-size:16px;&quot;&gt;\r\n	&lt;img src=&quot;http://n.sinaimg.cn/news/transform/20170216/JODb-fyamvns5616899.jpg&quot; alt=&quot;&quot; /&gt; \r\n&lt;/div&gt;\r\n&lt;div class=&quot;img_wrapper&quot; style=&quot;text-align:center;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;font-size:16px;&quot;&gt;\r\n	&lt;img src=&quot;http://n.sinaimg.cn/news/transform/20170216/PG94-fyamvns5616881.jpg&quot; alt=&quot;&quot; /&gt; \r\n&lt;/div&gt;\r\n&lt;p style=&quot;font-size:16px;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n	近日，一档披露日本雇主欺压中国研修生（即技能实习生）的电视节目在日本引发关注。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n	这档由日本东京电视台制作的节目披露了中国研修生在日本遭受的处境：高压、受虐待。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n	“外国人研修生”是日本于1993年设立的外国人技能实习制度，研修生在日本研修结束后，可以与企业签订合同，边劳动边学习技术。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n	但事实远没有说的那般美好，在日本的外来研修生实际与廉价劳动力无异。在日期间，研修生大多学不到什么特殊技能。他们通常在建筑业、金属成型业和食品加工业，从事低端的、劳动密集型的工作，这些都是被日本人排斥的“3K工作”（危险kiken，脏kitanai，累kitsui）。2015年，共有19.2万外国人以研修生的名义来到日本。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n	此外，研修生在工作中还面临着不公正对待、工伤事故高发、超负荷加班导致“过劳死”等状况。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n	根据日本厚生劳动省2016年8月的数据，被调查的5173家雇用外国研修生的日本雇主中，有七成违反了劳动基准法或劳动安全卫生法等法律。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n	不公的待遇和高强度的工作环境让外国研修生被迫另谋出路。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n	日本《产经新闻》报道称，2011年至2016年的五年间，“失踪”研修生人数不断增加，“失踪”的中国研修生已累计超过一万人。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n	这些情况的披露在日本引发了舆论反响，日本网友纷纷表示同情。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n	有网友愤怒指责这是强制劳动。还有网友认为，这是对他国公民的凌辱，自己作为日本人“感到十分羞愧”。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n	在日本广播协会NHK关于“消失的外国研修生”的报道中，日本网友更是群情激愤，表示这是“彻头彻尾的奴隶制”，长此以往，“周边国家都将对日本积怨深重”。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n	有人表示担忧，称如果不改革，研修生制度未来将引发更严重的问题；还有网友感叹道，“如果是自己也会逃离吧”。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n	《日本时报》2016年的一篇报道称，2015年，共有5803名在日研修生失踪，其中来自中国的为3116人，占到一大半。过去5年，这个数字一直在不断增加。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n	而那些失踪的人口，则很有可能成为黑市劳动力，比如从事地下导游等工作。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n	在研修生中，发生“过劳死”并不奇怪。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n	一名菲律宾籍研修生在日本岐阜县从事切割钢板和涂料方面的工作，每月超时工作长达122.5小时，但却拿着极少的薪水。最终，因为过度劳累，这名27岁的年轻人死在异国他乡。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n	而在2008年，曾有一名中国研修生的遗体在宿舍被人发现，死亡原因是心脏病突发，在就寝时死亡。据了解，死者在死亡前一个月，已经加班超过100个小时。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;text-align:center;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;font-size:16px;&quot;&gt;\r\n	&lt;img src=&quot;http://n.sinaimg.cn/news/transform/20170216/-m6b-fyarrcf4113219.jpg&quot; alt=&quot;资料图片：外国劳务者在东京集会，抗议歧视，要求基本权利。&quot; /&gt; \r\n&lt;/p&gt;\r\n&lt;p style=&quot;text-align:center;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;font-size:16px;&quot;&gt;\r\n	&lt;span class=&quot;img_descr&quot; style=&quot;line-height:20px;color:#666666;font-size:14px;&quot;&gt;资料图片：外国劳务者在东京集会，抗议歧视，要求基本权利。&lt;/span&gt; \r\n&lt;/p&gt;',1487744096,'',12),(75,'米兰守门员教练：唐纳鲁马让我非常自豪','&lt;p style=&quot;font-size:14px;font-family:宋体;background-color:#FFFFFF;&quot;&gt;\r\n	AC米兰守门员教练阿尔弗雷多-马尼（Alfredo-Magni）在接受《米兰晚邮报》采访时表示自己相信唐纳鲁马还能够变得更加出色，同时也为培育出唐纳鲁马这名天才门将而感到自豪。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:14px;font-family:宋体;background-color:#FFFFFF;&quot;&gt;\r\n	&lt;img src=&quot;http://img.mp.itc.cn/upload/20170222/d637a8d9765940d5bbfd38ae5d8fa377_th.jpeg&quot; /&gt;\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:14px;font-family:宋体;background-color:#FFFFFF;&quot;&gt;\r\n	唐纳鲁马\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:14px;font-family:宋体;background-color:#FFFFFF;&quot;&gt;\r\n	“能够培养出这样一名天才门将让我倍感自豪，哪怕我的贡献只有一丁点儿，我依旧还是会非常自豪。”阿尔弗雷多对记者说道。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:14px;font-family:宋体;background-color:#FFFFFF;&quot;&gt;\r\n	“更让我自豪的是，唐纳鲁马正逐渐变得更加强大，他的人格魅力也在不断成长当中。唐纳鲁马的头脑很冷静，同时也很尊敬其他球员，他遵守球队纪律，对待他人也很真诚。”\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:14px;font-family:宋体;background-color:#FFFFFF;&quot;&gt;\r\n	“要知道他马上才要刚满18岁，但是唐纳鲁马却已经是如此成熟，他的心理年龄和表现远超同龄人。目前唐纳鲁马只需要再多锻炼一下自己的体格，然后安心成长就够了，我相信一旦他的成长期结束，他就将成为世界上最顶尖的门将。”\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:14px;font-family:宋体;background-color:#FFFFFF;&quot;&gt;\r\n	随后阿尔弗雷多还谈到了唐纳鲁马离队的可能性，他表示自己并不在乎这件事：“这事儿我做不了主，但是我也不在乎。我和唐纳鲁马一同度过了许多美好的时光，我能做的就是让他继续快快乐乐地享受足球。”\r\n&lt;/p&gt;',1487735032,'',14),(76,'受新政影响，传邓卓翔或离申花加盟北方某队','&lt;p style=&quot;color:#333333;font-family:Arial, 宋体;font-size:14px;background-color:#FFFFFF;&quot;&gt;\r\n	足球2月20日讯 据申花队报微信公众号报道，效力于上海申花的邓卓翔或将迎来自己职业生涯新阶段。据悉，他有可能将加盟某北方球队。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;color:#333333;font-family:Arial, 宋体;font-size:14px;background-color:#FFFFFF;&quot;&gt;\r\n	报道称，此前，邓卓翔跟随申花参加了海口和冲绳两个阶段的冬训。从冬训的情况看，邓卓翔已经走出了伤病的困扰。海口阶段的训练是球队的体能储备期，申花练得非常辛苦，邓卓翔不仅顶了下来，而且很多时候还能跑在第一集团军。冲绳的热身赛，邓卓翔也获得了一定时间的上场机会，并在场上体现出了自己技术好，意识佳的特点。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;color:#333333;font-family:Arial, 宋体;font-size:14px;background-color:#FFFFFF;&quot;&gt;\r\n	尽管邓卓翔还在逐渐的寻找比赛的感觉和节奏，但是他的这些特点，主教练波耶特也是看在眼中。训练中，波耶特还是蛮重视邓卓翔，并给予他鼓励。熟悉邓卓翔的球队内部人士说：“波耶特跟曼萨诺完全不一样，训练中会经常鼓励小邓，这让小邓越踢越来劲，感觉越来越好。”或许了经历过一些挫折，所以邓卓翔更需要外界的肯定和鼓励。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;color:#333333;font-family:Arial, 宋体;font-size:14px;background-color:#FFFFFF;&quot;&gt;\r\n	在邓卓翔努力找回状态的时候，足协的新政将他推到了十字路口。按照新政的要求，球队的中超27人报名名单中必须要有至少4名U23球员，且首发名单中要有1名U23队员。这意味着非U23名额减少，球队内部的竞争变得非常之激烈。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;color:#333333;font-family:Arial, 宋体;font-size:14px;background-color:#FFFFFF;&quot;&gt;\r\n	计划赶不上变化。由于这突如其来的新政，很多球员的命运发生了改变，这也包括了邓卓翔。这位颇有天赋的，昔日抗韩英雄有可能会因此加盟某北方球队。\r\n&lt;/p&gt;',1487744539,'',14),(77,'官方：尼斯前锋普莱亚将缺席本赛季剩余比赛','&lt;p style=&quot;color:#333333;font-family:Arial, 宋体;font-size:14px;background-color:#FFFFFF;&quot;&gt;\r\n	足球2月21日讯 尼斯官网消息，球队前锋阿拉萨内-普莱亚赛季报销，将会缺席本赛季剩余比赛。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;color:#333333;font-family:Arial, 宋体;font-size:14px;background-color:#FFFFFF;&quot;&gt;\r\n	在北京时间2月12日尼斯与雷恩的比赛上半场临近结束时，普莱亚受伤被替换下场，后来诊断结果显示他需要进行膝关节手术。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;color:#333333;font-family:Arial, 宋体;font-size:14px;background-color:#FFFFFF;&quot;&gt;\r\n	普莱亚的赛季报销，加上上轮联赛巴洛特利的红牌禁赛，尼斯目前在进攻线上的选择已经变得非常之少了。\r\n&lt;/p&gt;',1487744587,'',14),(78,'CRC鸡西站开赛 王翔轻松跑出全场第二','&lt;p style=&quot;color:#333333;font-family:微软雅黑;font-size:15px;background-color:#EEF2F6;&quot;&gt;\r\n	北京时间2月17日-18日，2017年“珍宝岛药业”杯鸡西兴凯湖中国汽车拉力锦标赛将在黑龙江鸡西密山市正式开赛。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;color:#333333;font-family:微软雅黑;font-size:15px;background-color:#EEF2F6;&quot;&gt;\r\n	代表世一泉风行拉力车队出战的王翔在首日的比赛中以01:03:10.5的总用时位列全场第二，仅比樊凡慢了28秒，放眼全场，用一台N4的赛车追S6的赛车，能做出这样的成绩，除了王翔之外恐怕也没有几个人能做到了。北京时间2月17日-18日，2017年“珍宝岛药业”杯鸡西兴凯湖中国汽车拉力锦标赛将在黑龙江鸡西密山市正式开赛。\r\n&lt;/p&gt;\r\n&lt;div style=&quot;margin:0px;padding:0px;font-family:微软雅黑;font-size:15px;text-align:center;background-color:#EEF2F6;&quot;&gt;\r\n	&lt;img src=&quot;http://www.chinanews.com/2017/0221/201722116614.jpg&quot; /&gt; \r\n&lt;/div&gt;\r\n&lt;p style=&quot;color:#333333;font-family:微软雅黑;font-size:15px;background-color:#EEF2F6;&quot;&gt;\r\n	赛后王翔告诉记者，今天这个成绩自己还是比较满意的：“上午我们跑得比较顺利，下午突然刮起了大风，赛道里起了雪雾，对视线影响很大，所以下午我们跑得就比较收敛，放慢了速度，总的来说今天我们跑得还是比较中规中矩的，毕竟我们的赛车跟S6的赛车还是有一定的差距的，能守住这个全场第二的位置可以说还是不易的，明天我打算用更稳妥的策略去跑，保护赛车的同时争取稳稳完赛拿到积分，也为冲击年度总成绩打下基础吧。”\r\n&lt;/p&gt;',1487744633,'',14);

/*Table structure for table `slide` */

DROP TABLE IF EXISTS `slide`;

CREATE TABLE `slide` (
  `slide_id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `img` varchar(200) NOT NULL,
  `is_show` int(1) NOT NULL,
  `sort` int(3) NOT NULL,
  PRIMARY KEY (`slide_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

/*Data for the table `slide` */

insert  into `slide`(`slide_id`,`img`,`is_show`,`sort`) values (17,'5f02a898447e8145d4f9195ff621beee20170219161831.jpg',1,201),(16,'e44be415072b1262fde159577d4ead7b20170219161813.gif',1,200);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
