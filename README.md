#อย่าลืม ต้องมี employee.db อยู่ในโฟลเดอร์เดียวกับพวกโค้ด
##พวก css, html ที่หายไป รวมอยู่ใน php เรียบร้อยแล้ว



backup code employee.db (ข้อมูลเริ่มต้น ชื่ออาจโบราณหน่อยขออภัย) 

INSERT INTO employee (id, FirstName, LastName, NickName, Tel, Username, Password, Position)
VALUES 
(1, 'สยาม', 'เมืองยิ้ม', 'สยาม', '080-567-1111', 'sayam', 'password1', 'พ่อครัว'),
(2, 'สมหมาย', 'ประสิทธิ์', 'หมาย', '081-567-2222', 'sommai', 'password2', 'พ่อครัว'),
(3, 'สมชาติ', 'วงศ์สุข', 'ชาติ', '082-567-3333', 'somchart', 'password3', 'พ่อครัว'),
(4, 'สมรัก', 'สุขใจ', 'รัก', '083-456-4444', 'somrak', 'password4', 'พ่อครัว'),
(5, 'สมรส', 'วงศ์รส', 'รส', '084-567-5555', 'somros', 'password5', 'พ่อครัว'),
(6, 'สมศรี', 'ใจดี', 'ศรี', '085-123-4567', 'somsri', 'password6', 'พนักงาน'),
(7, 'สมหมาย', 'ประสิทธิ์', 'หมาย', '085-234-5678', 'sommai', 'password7', 'พนักงาน'),
(8, 'สมชาย', 'วงศ์สุข', 'ชาย', '085-345-6789', 'somchai', 'password8', 'พนักงาน'),
(9, 'สมใจ', 'สุขใจ', 'ใจ', '085-456-7890', 'somjai', 'password9', 'พนักงาน'),
(10, 'สมหวัง', 'สวัสดี', 'หวัง', '085-567-8901', 'somwang', 'password10', 'พนักงาน'),
(11, 'สมใหม่', 'มากล้น', 'ใหม่', '085-678-9012', 'sommai', 'password11', 'พนักงาน'),
(12, 'สมปอง', 'รุ่งเรือง', 'ปอง', '085-789-0123', 'sompong', 'password12', 'พนักงาน'),
(13, 'สมหมี', 'สุดใจ', 'หมี', '085-890-1234', 'sommee', 'password13', 'พนักงาน'),
(14, 'สมดี', 'เจริญสุข', 'ดี', '085-901-2345', 'somdi', 'password14', 'พนักงาน'),
(15, 'สมฤดี', 'พรหมสุข', 'ฤดี', '085-012-3456', 'somrudee', 'password15', 'พนักงาน'),
(16, 'สมสวย', 'อ่อนงาม', 'สวย', '085-123-4567', 'somsuai', 'password16', 'พนักงาน'),
(17, 'สมสมาน', 'สุขประดิษฐ์', 'สมาน', '085-234-5678', 'somsaman', 'password17', 'พนักงาน'),
(18, 'สมสู่', 'สุขสบาย', 'สมสู่', '085-345-6789', 'somsu', 'password18', 'พนักงาน'),
(19, 'สมบูรณ์', 'สุขภาพ', 'บูรณ์', '085-456-7890', 'sombun', 'password19', 'พนักงาน'),
(20, 'สมเกียรติ', 'ทวีสุข', 'เกียรติ', '085-567-8901', 'somkiat', 'password20', 'พนักงาน');
