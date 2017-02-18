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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `category` */

insert  into `category`(`cat_id`,`cat_name`,`pid`) values (1,'电子商务',0),(4,'计算机',0),(12,'新闻',0),(11,'互联网',0),(13,'娱乐',0);

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
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;

/*Data for the table `message` */

insert  into `message`(`message_id`,`title`,`content`,`addtime`,`img`,`cat_id`) values (50,'港股大涨后，还有什么投资机会？','港股大涨后，还有什么投资机会？港股大涨后，还有什么投资机会？港股大涨后，还有什么投资机会？',1486778512,'',12),(4,'习近平同美国总统特朗普通电话','习近平同美国总统特朗普通电话习近平同美国总统特朗普通电话',1486778512,'',12),(5,'李克强为何把清理涉企收费提到如此高度','李克强为何把清理涉企收费提到如此高度李克强为何把清理涉企收费提到如此高度',1486778512,'',12),(6,'中美军机被指在南海上空接近 仅相距305米','中美军机被指在南海上空接近 仅相距305米中美军机被指在南海上空接近 仅相距305米',1486778512,'',12),(7,'公安部：城区常住人口300万以下城市不得积分落户','公安部：城区常住人口300万以下城市不得积分落户公安部：城区常住人口300万以下城市不得积分落户',1486778512,'',12),(8,'滞留印度54年老兵计划今日回国：最想吃家乡手擀面','滞留印度54年老兵计划今日回国：最想吃家乡手擀面滞留印度54年老兵计划今日回国：最想吃家乡手擀面',1486778512,'',12),(9,'18大后20名省部级干部被降级 最重从副省级变科员','18大后20名省部级干部被降级 最重从副省级变科员18大后20名省部级干部被降级 最重从副省级变科员',1486778512,'',12),(10,'四川：男性公民满18周岁都必须兵役登记','四川：男性公民满18周岁都必须兵役登记四川：男性公民满18周岁都必须兵役登记',1486778512,'',12),(11,'国土部：城里人不能够到农村买卖宅基地','国土部：城里人不能够到农村买卖宅基地国土部：城里人不能够到农村买卖宅基地',1486778512,'',11),(12,'钢铁工人分流竞聘做保安 收入下滑近七成','钢铁工人分流竞聘做保安 收入下滑近七成钢铁工人分流竞聘做保安 收入下滑近七成',1486778512,'',11),(13,'行贿44万被曝光，华谊兄弟王中军该负什么责任？','行贿44万被曝光，华谊兄弟王中军该负什么责任？行贿44万被曝光，华谊兄弟王中军该负什么责任？',1486778512,'',11),(14,'北汽自有品牌销量雪崩 1月份仅卖出30辆轿车','北汽自有品牌销量雪崩 1月份仅卖出30辆轿车北汽自有品牌销量雪崩 1月份仅卖出30辆轿车',1486778512,'',11),(15,'雷军说要开1000家小米之家时 就知道小米更悬了','雷军说要开1000家小米之家时 就知道小米更悬了雷军说要开1000家小米之家时 就知道小米更悬了',1486778512,'',11),(51,'习近平向德国当选总统施泰因迈尔致贺电','习近平向德国当选总统施泰因迈尔致贺电习近平向德国当选总统施泰因迈尔致贺电',1486949749,'',12),(28,'两人偷一篮鸡蛋被判两年？篮子里藏着3万元ddd','两人偷一篮鸡蛋被判两年？篮子里藏着3万元两人偷一篮鸡蛋被判两年？篮子里藏着3万元ddd2',1486781603,'',11),(29,'演员发微博曝大量垃圾倾倒怒江 当地官方启动问责','演员发微博曝大量垃圾倾倒怒江 当地官方启动问责演员发微博曝大量垃圾倾倒怒江 当地官方启动问责',1486781611,'',1),(30,'女童输液吃包子致呼吸道梗阻死亡 卫生局：等尸检','女童输液吃包子致呼吸道梗阻死亡 卫生局：等尸检女童输液吃包子致呼吸道梗阻死亡 卫生局：等尸检',1486781617,'',0),(34,'韩国口蹄疫蔓延 代总统称或动用军队控制疫情','韩国口蹄疫蔓延 代总统称或动用军队控制疫情韩国口蹄疫蔓延 代总统称或动用军队控制疫情',1486783472,'',4),(35,'美国出了个斯诺登2.0：私藏50TB机密文件和数据','美国出了个斯诺登2.0：私藏50TB机密文件和数据美国出了个斯诺登2.0：私藏50TB机密文件和数据',1486783486,'',4),(37,'曾创14个涨停的“妖股最近歇菜了2.5亿主力资金撤离','曾创14个涨停的“妖股最近歇菜了2.5亿主力资金撤离曾创14个涨停的“妖股最近歇菜了2.5亿主力资金撤离',1486783665,'',4),(38,'沪指涨0.42%盘中突破3200 钢铁板块领涨','沪指涨0.42%盘中突破3200 钢铁板块领涨沪指涨0.42%盘中突破3200 钢铁板块领涨',1486789633,'',4),(39,'沪指涨0.42%盘中突破3200 钢铁板块领涨','沪指涨0.42%盘中突破3200 钢铁板块领涨沪指涨0.42%盘中突破3200 钢铁板块领涨',1486789636,'',4),(44,'CBA季后赛形势：5队争两张门票 两大冠军豪门危险','CBA季后赛形势：5队争两张门票 两大冠军豪门危险CBA季后赛形势：5队争两张门票 两大冠军豪门危险',1486794577,'',4),(43,'抬价手段？中国足球留洋陷围城 新政造归国潮','抬价手段？中国足球留洋陷围城 新政造归国潮抬价手段？中国足球留洋陷围城 新政造归国潮',1486794557,'',4),(52,'斯诺登：“不惧怕”被俄罗斯引渡回美国','斯诺登：“不惧怕”被俄罗斯引渡回美国斯诺登：“不惧怕”被俄罗斯引渡回美国',1486949782,'',1),(53,'总理批示 18部委通力破除回国留学生创业壁垒','总理批示 18部委通力破除回国留学生创业壁垒总理批示 18部委通力破除回国留学生创业壁垒',1486953852,'',1),(54,'江苏一货轮在印度被扣押 23名船员被困一个多月','江苏一货轮在印度被扣押 23名船员被困一个多月江苏一货轮在印度被扣押 23名船员被困一个多月',1486953862,'',1),(55,'德国汉堡机场68人吸入不明气体受伤 已排除恐袭','德国汉堡机场68人吸入不明气体受伤 已排除恐袭德国汉堡机场68人吸入不明气体受伤 已排除恐袭',1486954116,'',4),(56,'美日韩呼吁召开紧急会议 称朝发射导弹系挑战特朗普','美日韩呼吁召开紧急会议 称朝发射导弹系挑战特朗普美日韩呼吁召开紧急会议 称朝发射导弹系挑战特朗普',1486954136,'',0),(58,'2017年房价终于要跌了？这要看房地产税何时推出','2017年房价终于要跌了？这要看房地产税何时推出2017年房价终于要跌了？这要看房地产税何时推出',1486955069,'',0),(59,'得知“红颜知己”遭家暴 男子砸了她丈夫2辆车','得知“红颜知己”遭家暴 男子砸了她丈夫2辆车得知“红颜知己”遭家暴 男子砸了她丈夫2辆车',1486957641,'',0),(60,'陕西少年公交上指认小偷遭群殴 4名疑犯全部落网','陕西少年公交上指认小偷遭群殴 4名疑犯全部落网陕西少年公交上指认小偷遭群殴 4名疑犯全部落网',1486957724,'',0),(61,'男子出轨被手机“出卖” 状告打车软件索赔巨款','男子出轨被手机“出卖” 状告打车软件索赔巨款',1486958729,'',0),(62,'揭秘“色播”江湖：尺度惊人00后凌晨看直播刷跑车','揭秘“色播”江湖：尺度惊人00后凌晨看直播刷跑车揭秘“色播”江湖：尺度惊人00后凌晨看直播刷跑车',1486958844,'',13),(64,'陕西少年公交上指认小偷遭群殴 4名疑犯全部落网','陕西少年公交上指认小偷遭群殴 4名疑犯全部落网陕西少年公交上指认小偷遭群殴 4名疑犯全部落网',1486959443,'',0),(65,'成都地铁&quot;公鸡下蛋&quot;广告遭停播 被市民投诉太低俗','成都地铁&quot;公鸡下蛋&quot;广告遭停播 被市民投诉太低俗成都地铁&quot;公鸡下蛋&quot;广告遭停播 被市民投诉太低俗2',1486970847,'',0),(66,'得知“红颜知己”遭家暴 男子砸了她丈夫2辆车','得知“红颜知己”遭家暴 男子砸了她丈夫2辆车得知“红颜知己”遭家暴 男子砸了她丈夫2辆车',1486970856,'',0),(68,'武汉：33名“老赖”在看守所度过鸡年春节','武汉：33名“老赖”在看守所度过鸡年春节武汉：33名“老赖”在看守所度过鸡年春节',1486970882,'',0),(70,'武汉速度赛马公开赛开锣 人欢马嘶闹新春(图)','武汉速度赛马公开赛开锣 人欢马嘶闹新春(图)武汉速度赛马公开赛开锣 人欢马嘶闹新春(图)',1486971089,'',13),(71,'外媒称中国欲造“美国化”航母 两艘派驻南海','外媒称中国欲造“美国化”航母 两艘派驻南海外媒称中国欲造“美国化”航母 两艘派驻南海',1487137122,'1487079192656.jpg',0),(72,'《环球时报》专访黄洁夫：卫生部前高官细述中国器官移植','《环球时报》专访黄洁夫：卫生部前高官细述中国器官移植《环球时报》专访黄洁夫：卫生部前高官细述中国器官移植',1487138485,'20170215041612195.jpg',13),(73,'云南镇雄回应“返乡男子称遭强行结扎”：已获其同意，没殴打','云南镇雄回应“返乡男子称遭强行结扎”：已获其同意，没殴打云南镇雄回应“返乡男子称遭强行结扎”：已获其同意，没殴打',1487141386,'1487118352919.jpg',0),(74,'3000多名中国实习生在日本诡异“失踪” 竟曝出惊人内幕','&lt;div class=&quot;img_wrapper&quot; style=&quot;text-align:center;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;font-size:16px;&quot;&gt;\r\n	&lt;img src=&quot;http://n.sinaimg.cn/news/transform/20170216/JODb-fyamvns5616899.jpg&quot; alt=&quot;&quot; /&gt; \r\n&lt;/div&gt;\r\n&lt;div class=&quot;img_wrapper&quot; style=&quot;text-align:center;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;font-size:16px;&quot;&gt;\r\n	&lt;img src=&quot;http://n.sinaimg.cn/news/transform/20170216/PG94-fyamvns5616881.jpg&quot; alt=&quot;&quot; /&gt; \r\n&lt;/div&gt;\r\n&lt;p style=&quot;font-size:16px;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n	近日，一档披露日本雇主欺压中国研修生（即技能实习生）的电视节目在日本引发关注。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n	这档由日本东京电视台制作的节目披露了中国研修生在日本遭受的处境：高压、受虐待。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n	“外国人研修生”是日本于1993年设立的外国人技能实习制度，研修生在日本研修结束后，可以与企业签订合同，边劳动边学习技术。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n	但事实远没有说的那般美好，在日本的外来研修生实际与廉价劳动力无异。在日期间，研修生大多学不到什么特殊技能。他们通常在建筑业、金属成型业和食品加工业，从事低端的、劳动密集型的工作，这些都是被日本人排斥的“3K工作”（危险kiken，脏kitanai，累kitsui）。2015年，共有19.2万外国人以研修生的名义来到日本。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n	此外，研修生在工作中还面临着不公正对待、工伤事故高发、超负荷加班导致“过劳死”等状况。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n	根据日本厚生劳动省2016年8月的数据，被调查的5173家雇用外国研修生的日本雇主中，有七成违反了劳动基准法或劳动安全卫生法等法律。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n	不公的待遇和高强度的工作环境让外国研修生被迫另谋出路。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n	日本《产经新闻》报道称，2011年至2016年的五年间，“失踪”研修生人数不断增加，“失踪”的中国研修生已累计超过一万人。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n	这些情况的披露在日本引发了舆论反响，日本网友纷纷表示同情。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n	有网友愤怒指责这是强制劳动。还有网友认为，这是对他国公民的凌辱，自己作为日本人“感到十分羞愧”。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n	在日本广播协会NHK关于“消失的外国研修生”的报道中，日本网友更是群情激愤，表示这是“彻头彻尾的奴隶制”，长此以往，“周边国家都将对日本积怨深重”。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n	有人表示担忧，称如果不改革，研修生制度未来将引发更严重的问题；还有网友感叹道，“如果是自己也会逃离吧”。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n	《日本时报》2016年的一篇报道称，2015年，共有5803名在日研修生失踪，其中来自中国的为3116人，占到一大半。过去5年，这个数字一直在不断增加。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n	而那些失踪的人口，则很有可能成为黑市劳动力，比如从事地下导游等工作。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n	在研修生中，发生“过劳死”并不奇怪。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n	一名菲律宾籍研修生在日本岐阜县从事切割钢板和涂料方面的工作，每月超时工作长达122.5小时，但却拿着极少的薪水。最终，因为过度劳累，这名27岁的年轻人死在异国他乡。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n	而在2008年，曾有一名中国研修生的遗体在宿舍被人发现，死亡原因是心脏病突发，在就寝时死亡。据了解，死者在死亡前一个月，已经加班超过100个小时。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;text-align:center;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;font-size:16px;&quot;&gt;\r\n	&lt;img src=&quot;http://n.sinaimg.cn/news/transform/20170216/-m6b-fyarrcf4113219.jpg&quot; alt=&quot;资料图片：外国劳务者在东京集会，抗议歧视，要求基本权利。&quot; /&gt;\r\n&lt;/p&gt;\r\n&lt;p style=&quot;text-align:center;font-family:&#039;Microsoft YaHei&#039;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;font-size:16px;&quot;&gt;\r\n	&lt;span class=&quot;img_descr&quot; style=&quot;line-height:20px;color:#666666;font-size:14px;&quot;&gt;资料图片：外国劳务者在东京集会，抗议歧视，要求基本权利。&lt;/span&gt;\r\n&lt;/p&gt;',1487221538,'',13);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
