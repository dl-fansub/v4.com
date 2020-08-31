# dl-fansub.com

```text
ระบบทำงานประมาณนี้ 
// 
แปลสด/eng 
encoder:แก้ raw อัพโหลดให้ใช้ 
QC sub / Typeset ภาพ
อัพโหลดให้ encoder 
encode => ถ้าเป็น BD จะตรวจก่อน => ปล่อย
```

#### Member 
- **Admin** (Producer)
  - Admin = Producer = พระเจ้า
- **Moderator** (Director)
  - สตาฟทีมงาน (ตั้ง mod ประจำเรื่อง)
  - ผู้ดูแล , add ได้ทุกอย่าง edit แล้วขึ้นเลย , แก้และดูข้อมูล user ได้ , ทำได้ทุกอย่างบนบอร์ด , ตรวจการ edit ของ user ปกติ
- **New Moderator** (Writer)
  - Mod ใหม่
- **FanSub** (FanSubs)
  - FanSub ที่เอามาแจก แอดเองได้ edit ได้ ไม่ต้องนับแต้ม
- **Provider** (Provider)
  - ผู้ให้บริการ lol , add ได้ทุกดอย่าง , edit แล้วขึ้นเลย , ไม่มีอำนาจพิเศษ
  - แอดของได้ แต้มเพิ่มจากการแอด คัดเลือกคนโดน mod เอง 
  - ข้อกำหนดในการขอ writer ให้มีกระทู้ในหมวดแจกของ 10+
  - แอดของได้ แต้มเพิ่มจากการแอด คัดเลือกคนโดน mod เอง ไม่มีของแจกก็ปลดเป็น member
- **Member+** (AV Actor)
  - (ยืนยัน 18+) สูบได้ + สูบมืด
  - โหลดปกติ + ของมืด
  Writer ->provider 
  - ข้อกำหนดในการขอ writer ให้มีกระทู้ในหมวดแจกของ 10+
  - แอดของได้ แต้มเพิ่มจากการแอด คัดเลือกคนโดน mod เอง ไม่มีของแจกก็ปลดเป็น member
  provider -> fansub
  - fansub ที่เอามาแจก แอดเองได้ edit ได้ ไม่ต้องนับแต้ม
  - add ได้ทุกอย่าง , edit ของตัวเองได้, edit ของคนอื่นแล้วต้องรอให้ mod ตรวจถึงขึ้น
- **Member** (Actor)
  - โหลดได้ปกติ แต้มเยอะ
- **User**
  - โหลดจำกัด แต้มน้อย
  - ad ไม่ได้ , edit ไม่ได้ , โพสได้

---

เช่น 1 เพลงมีโฮสเรา กับพวก 1 2 3 4 mirror
*********************************
* สมมุติ ผมดู youtube แล้วเจอ vdo เกี่ยวกับเพนกวิ้น , ก็ไปโพส กระทู้ [xxxxxx vdo xxxx] แล้วเลือกหัวข้อเป็น [เพนกวิ้น]
กระทู้นี้ก็จะไปโผล่ใน feed ของเพนกวิ้นคล้าย ๆ status ของ page ที่เรา like

*ทำเป็นระบบพิมพ์ใส่ guesbook แต่เลือกให้เฉพาะเจ้าของ gb กับผู้พิมพ์เห็น

ปุ่ม ติดตาม เปลี่ยนระบบ เป็น ให้ขึ้น แจ้งเตือน เหมือน แจ้งเตือนใน fb 


---------
ชื่อเรื่องนั้น ๆ คือ Sub-Forum , กระทู้ที่อยู่ในนั้นคือ Topic ที่ user ตั้ง
การที่มี Sub Forum [หัวข้อ : ชื่อเรื่องนั้น ๆ ] ขึ้นมา เกิดจากการสร้าง Item บนเว็ป [ชื่อเรื่องนั้น ๆ ]
เข้าใจตรงกันปะ =A=


คือสมมุติ เราจะทำระบบนี้ละ แยกกระทู้ ก็ทำได้อีก 2 แบบ
- ให้ user ตั้งเองได้ตามต้องการ
- ให้ mod ของเรื่องนั้น ๆ ตั้งได้เท่านั้น
ซึ่งการแจ้งเตือนของทั้ง 2 แบบก็จะแตกต่างออกไปอีกที


player ที่ใช้สำหรับ stream เป็น player จาก freedom แล้วเอามาเปลี่ยนโลโก้กับ skin เองได้
เซิฟแยก 3 ตัวเลย เพลง stream ฝากไฟล์
ดึง url มาเล่นบน player


Anime
Visual Novel -> Manga - Novel - (Doujin)
Media -> Music - Artwork - Photo - (Hentai)
 - Hentai


=Type
Anime - Manga - Novel - Doujin

Album - Artwork - Photo - Hentai
(Classic/Modern/Gridview)

Album Name [simpletext]
- Album Pic [IMG]
- Release Date [DD/MM/YY]
- Anime (from) [Link to Anime-Item]
- Artist [Artist-Item/Simpletext]
- Tracklist
- Download links [DLL/Torrent]
- Sample [Title & URL/online player]

Media-Artwork
- Artwork Name [Simple Text]
- Artwork Pic [IMG]
- From [Anime & Manga - Item/Original Story]
- Illust [Artist-Item/simpletext]
- Sample Pics [IMG/choose from Online reader?]
- Artwork-Genres [checkbox]
- ? Online Reader
- ? Themes [simpletext]
- ? [Forum link]

Media-Photos
- Album Name
- Album Pic [choose from Online viewer]
- Description Text [Text box with Codes]
- Pictures [Uploader]
- Event [choose from Event-Page ?]
- Photograph [User-Profile/Artist-Item/Simple Text]
- ? [Forum link]
- ? สามารถแยกแต่ละภาพลง Anime/Manga ได้ เช่นสำหรับ Cosplayer



=Genre
=FanSubs
Name

=FanSubs_Team
user_id
fansub_id


=Item
Name ชื่อ
Genres_table ประเภท
Review เรื่องย่อ
created
modified

=Item
item_id ชื่อเรื่อง
Image_preview รูปตัวอย่าง
ongoing ตอนปัจจุบัน (0=Complated)
espisode ตอนทั้งหมด (0=Seires)
release_date (timestamp)
official_site
theme_table ภาพรวม
screenshot_table
download_table   -> Stream
fansubs_table
created
modified

=Item_Anime
studio ชื่อบริษัท

=Item_Manga
Author คนแต่ง
Illust คนวาด

=Item_Novel
Author (user_id/author_id)


=Novel_chapter
chapter_id
chapter
text


-----------------------------
Home
Board
Chat
? ->Anime - Manga - Novel
? ->Album - Artwork - Photo
MediaUpdate หรือศัพท์อื่น / 18+ -> - Eroge -  H -Game
About us/Staff room


ฉันว่าให้แสดงลิงค์โหลด กับ ลิงค์ไปหน้า item น่าจะเวิร์คสุดละมั่ง หรือคิดว่าไง

credit จะรับครั้งต่อไปได้หลังจาก ผ่าน 24 ชม.  ไปนับจากที่รับครั้งล่าสุด
แล้วถ้า online ก็ค่อยเพิ่มให้
แล้วตั้งกระทู้ หรือ add item ก็+ เข้าไป



โปรไฟล์อย่างที่บอกอะ ให้ html เสรีแบบตาราง 1 ตัวพอ
แต่งได้หมด ว่าอยากแสดงส่วนไหนมั่ง
คือ html เสรี ใส่พวก img ไรได้
จริง ๆ มันมีระบบเงินเอาไว้ซื่อของไรด้วย
เข้ามากดทุกวันเหมือนกัน


แล้วค่อยจัดกิจกรรม เอาไว้ลดตังกัน


-----------------------------------

เพิ่ม Status ของทุกคน
ขึ้น Update เฉพาะ Staff เหมือนทวิส 

งั้นมีระบบให้เลือกกลุ่มที่แสดงได้ ?
ให้อยู่ pannel เดียวกับ ยศพิเศษที่ซื่อหรือได้จากการโพส
Producer หนังโลลิ  




## Detail
- หน่วยของ Point ที่ใช้ซื้อของในเว็บ (ตอนนี้ใช้  Gold Silver Copper) (ของที่ขายในราคา 1 P ต้องจ่ายให้ Server เท่านั้น)
   -1 ไม่จำกัดแจกให้ใครไม่ได้
   -2 ไม่จำกัดแจกเงินได้
   -3 ไม่จำกัดแจกเงินได้ แจก user ไม่กำกัดเงินได้ (Admin)

เมื่อคุณโดนแบน
- Username นั้นจะไม่สามารถ Login ได้อีก
- เครื่องของคุณจะถูก Lock ทำให้ไม่สามารถใช้ ID ใดๆ  Login ได้อีกเลย
- การโดนแบนมีผลไปจนถึงการสมัครสมาชิกหากมีการสมัครใหม่โดยเครื่องนั้นๆ ID ใหม่จะโดนแบน ตามไปด้วย

อัพ Avatar แยกจาก Profile
ดู Youtube กัย nico ได้เลย รูปด้วย
อัพ emo เองได้
คุย private ได้


Private 		/user	 	/dvgamer
Emo 		#Text 		#id!o-o#

Thumbnail 	http://img.youtube.com/vi/VIDEO_ID/#.jpg
Thumbnail 	http://tn-skr#.smilevideo.jp/smile?i=VIDEO_ID
#(1-3)

<script type="text/javascript" src="http://ext.nicovideo.jp/thumb_watch/sm15935648?w=420&h=315"></script>
<iframe width="420" height="315" src="http://www.youtube.com/embed/6mLpP2F0LmQ?autoplay=1" frameborder="0"></iframe>

ระบบจัดกิจกรรมในบอร์ด


#### เงื่อนไขต่างๆ ในการสมัครเป็นนักแสดงในสังกัด dl-fs

- ไม่อนุญาติให้มีหลาย id ถ้าจับได้ลบทุก id ครับ
- ห้ามเเกล้งปล่อยไวรัสหรืออะไรที่ใกล้เคียง
- สำหรับนักปั๊มหากwarnถึง80%แต่ไม่เกิน90% เราจะมี2ทางเลือกให้เลือกครับ คือ 
- 1.รีโพสต์ทั้งหมดเป็น 0 แต่%warnยังอยู่เท่าเดิม
- 2.warnเพิ่มอีก10% ซึ่งท่านจะมีwarn90% (จำนวนโพสยังอยู่ครบ)หากปั๊มจนโพสถึง20จะใช้ตัวเลือกข้อ1แทน
- ส่วนคนที่มีwarn90% หากเจอว่าปั๊มจะรีโพสเป็น0ทันทีและwarn90%ยังอยู่เหมือนเดิม หากยังไม่เลิกปั๊มโดนแบนนะครับ
- ห้ามโฟสรูปลามกอนาจาร warn 30% แต่ถ้าทำผิดกฏข้อนี่ 3 ครั้ง แบน เพราะถือว่าจงใจ รวมไปถึงavatarและลายเซนด้วยนะครับ
- ห้ามโพสก่อกวนสมาชิกคนอื่่น
- ห้ามก่อความไม่สงบในเวป หรือ จงใจ ยั่วยุให้เกิดความแตกแยกภายในเวป
- ห้ามคุยเรื่องการเมืองในเวปไซร์แห่งนี้ไม่ว่าจะในกระทู้หรือSBพบเจอwarnตามเนื้อหาประเด็นที่คุย 
- ห้ามโพสว่าร้ายแก่บุคคล,ศาสนา,สถาบันกษัตริย์
- ห้ามไม่ให้เเอบอ้างผลงานของคนอื่นว่าเป็นของตัวเอง
- ห้ามตอบกระทู้ที่ดูเหมือนกับจงใจปั๊ม เช่น "อิโมตัวเดียวหรือหลายตัว หรือข้อความไม่เกี่ยวกับเนื้อหากระทู้โดยหาสาระไม่ได้(นอกประเด็นแต่มีสาระ อนุโลมครับ) หรือโฟสต์เเต่คำว่า ขอบคุณ,thank หรืออะไรที่เข้าข่าย" พบเจอ warn10%หากโดนไปแล้วยังไม่เลิกปั๊มwarnเพิ่มอีก20%พร้อมลบโพสทั้งหมดที่มี แต่สำหรับผู้ที่เป็นMemberแล้วอุณาญาตให้โพสเกิน20โพสต่อวันได้ครับ

`เข้าใจและยอมรับ เงื่อนไขของสังกัด`

**ความเห็นของข้าคือ บทบัญญัติขั้นสูงสุด**

`เข้าใจและยอมรับ เงื่อนไขของลุงเลท`

- ห้ามแบ่งส่วนโหลดโดยเด็ดขาด ช่วยกันถนอมเครื่องSVด้วยครับ
- ห้ามHot linkนะครับ 
- สำหรับผู้ที่เป็น สมาชิกธรรมดา หรือขาจรไปมาทั้งหลาย
- สำหรับโซนพิเศษตอนนี้ยังหาข้อตกลงกันไม่ได้เกี่ยวกับจำนวนโพสต์เพื่อเข้าโซนนี้

`เข้าใจและยอมรับ การดาวน์โหลด`

- Avatar ห้ามใหญ่เกิน 100 x100
- Signature (ลายเซ้น) ห้ามใหญ่เกิน 600 x 200 ทั้งนี้รวมไปถึงตัวหนังสือด้วยนะครับ เช่น รูปสูง150 แต่ ตัวหนังสือสูงเกิน50 ถือว่าเกิน ครั้งแรกจะPMไปเตือนก่อน หากยังเพิกเฉยwarn10% หากยังไม่ปรับปรุงอีกwarnเพิ่มอีก20%พร้อมลายเซนสวยๆจากmodหรือadminจะแก้ให้รับรองโดนใจแน่นอน

`เข้าใจและยอมรับ Avatar และ Signature`

อ่านข้อตกลงเรียบร้อย และขอสาบานว่าจะปฏิบัติ อย่างเคร่งครัด! ไฮ ดิจิตอลเลิฟเวอร์


### Donate

Once Time

- Thanks

Tier 1 - 1$

- Supported Thanks

Tier 2 - 5$

- Supported Thanks
- Secret Item
- Premium Lv.1

Tier 3 - 9$

- Supported Thanks
- Secret Item
- Premium Lv.2

Tier 4 - 16$

- Supported Thanks
- Secret Item
- Premium Lv.3

Tier 5 - 32$

- Support Thanks
- Secret Item
- Premium Lv.4

Tier 6 - 99$

- Supported Thanks
- Secret Item
- Premium Lv.5



### TEAM

- List User from Discord role `team`.



### Join

Form submit jobs.

- discord account
- nickname
- อยากทำอะไรให้กับ dl-fs



### terms





### fansub rules




## Build Setup

```bash
# install dependencies
$ npm i

# serve with hot reload at localhost:3000
$ npm run dev

# build for production and launch server
$ npm run build
$ npm run start
```

For detailed explanation on how things work, check out [Nuxt.js docs](https://nuxtjs.org).
