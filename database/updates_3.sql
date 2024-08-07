
INSERT INTO viaje(COD_VIA, FECHA_VIA, HORA_VIA, DURACION, BUS, DESTINO, ORIGEN, PRECIO_BASE) VALUES
('VIA021', '2024-07-19', '08:00:00', '02:30:00', 'ABC123', 'AREQUI', 'LIMA', 50.00), 
('VIA022', '2024-07-20', '09:00:00', '03:15:00', 'DEF456', 'CAMANA', 'LIMA', 55.00), 
('VIA023', '2024-07-21', '10:00:00', '04:00:00', 'GHI789', 'CHICLA', 'LIMA', 60.00), 
('VIA024', '2024-07-22', '11:00:00', '01:45:00', 'JKL012', 'CHIMBO', 'LIMA', 65.00), 
('VIA025', '2024-07-23', '12:00:00', '02:30:00', 'MNO345', 'HUARME', 'LIMA', 70.00), 
('VIA026', '2024-07-24', '13:00:00', '03:15:00', 'ABC123', 'ICA', 'LIMA', 75.00), 
('VIA027', '2024-07-25', '14:00:00', '04:00:00', 'DEF456', 'LIMA', 'TRUJIL', 80.00), 
('VIA028', '2024-07-26', '15:00:00', '01:45:00', 'GHI789', 'TRUJIL', 'LIMA', 85.00), 
('VIA029', '2024-07-27', '16:00:00', '02:30:00', 'JKL012', 'AREQUI', 'LIMA', 90.00), 
('VIA030', '2024-07-28', '17:00:00', '03:15:00', 'MNO345', 'CAMANA', 'LIMA', 95.00), 
('VIA031', '2024-07-29', '18:00:00', '04:00:00', 'ABC123', 'CHICLA', 'LIMA', 100.00), 
('VIA032', '2024-07-30', '19:00:00', '01:45:00', 'DEF456', 'CHIMBO', 'LIMA', 105.00), 
('VIA033', '2024-07-31', '20:00:00', '02:30:00', 'GHI789', 'HUARME', 'LIMA', 110.00), 
('VIA034', '2024-08-01', '21:00:00', '03:15:00', 'JKL012', 'ICA', 'LIMA', 115.00), 
('VIA035', '2024-08-02', '22:00:00', '04:00:00', 'MNO345', 'LIMA', 'TRUJIL', 120.00), 
('VIA036', '2024-08-03', '23:00:00', '01:45:00', 'ABC123', 'TRUJIL', 'LIMA', 125.00), 
('VIA037', '2024-08-04', '08:00:00', '02:30:00', 'DEF456', 'AREQUI', 'LIMA', 130.00), 
('VIA038', '2024-08-05', '09:00:00', '03:15:00', 'GHI789', 'CAMANA', 'LIMA', 135.00), 
('VIA039', '2024-08-06', '10:00:00', '04:00:00', 'JKL012', 'CHICLA', 'LIMA', 140.00), 
('VIA040', '2024-08-07', '11:00:00', '01:45:00', 'MNO345', 'CHIMBO', 'LIMA', 145.00);



INSERT INTO usuario(COD_USER, NOMBRES, APELLIDOS, CORREO, PASSWORD) VALUES
('US1004', 'Juan', 'Perez', 'juan.perez@example.com', 'Pass1234'), 
('US1005', 'Maria', 'Lopez', 'maria.lopez@example.com', 'Lopez1234'), 
('US1006', 'Carlos', 'Gomez', 'carlos.gomez@example.com', 'GoMez1234'), 
('US1007', 'Ana', 'Martinez', 'ana.martinez@example.com', 'Martinez1A'), 
('US1008', 'Luis', 'Hernandez', 'luis.hernandez@example.com', 'HerNandez2'), 
('US1009', 'Elena', 'Ruiz', 'elena.ruiz@example.com', 'Ruiz1234!'), 
('US1010', 'David', 'Ramirez', 'david.ramirez@example.com', 'Ramirez34$'), 
('US1011', 'Laura', 'Diaz', 'laura.diaz@example.com', 'DiazLa34#'), 
('US1012', 'Jose', 'Mendez', 'jose.mendez@example.com', 'Mendez12%'), 
('US1013', 'Sara', 'Vega', 'sara.vega@example.com', 'VegaSara12');


INSERT INTO reserva(COD_RESERVA, COD_VIA, COD_USER, ID_ASIENTO, ESTADO) VALUES
('1', 'VIA001', 'US1004', 1, 'Pagado'), 
('2', 'VIA003', 'US1005', 2, 'Pagado'), 
('3', 'VIA005', 'US1006', 3, 'Pagado'), 
('4', 'VIA007', 'US1007', 4, 'Pagado'), 
('5', 'VIA009', 'US1008', 5, 'Pagado'), 
('6', 'VIA010', 'US1009', 6, 'Pagado'), 
('7', 'VIA011', 'US1010', 7, 'Pagado'), 
('8', 'VIA012', 'US1011', 8, 'Pagado'), 
('9', 'VIA013', 'US1012', 9, 'Pagado'), 
('10', 'VIA014', 'US1013', 10, 'Pagado'),
('11', 'VIA015', 'US1004', 11, 'Pagado'), 
('12', 'VIA016', 'US1005', 12, 'Pagado'), 
('13', 'VIA017', 'US1006', 13, 'Pagado'), 
('14', 'VIA018', 'US1007', 14, 'Pagado'), 
('15', 'VIA019', 'US1008', 15, 'Pagado'), 
('16', 'VIA020', 'US1009', 16, 'Pagado'), 
('17', 'VIA002', 'US1010', 17, 'Pagado'), 
('18', 'VIA004', 'US1011', 18, 'Pagado'), 
('19', 'VIA006', 'US1012', 19, 'Pagado'), 
('20', 'VIA008', 'US1013', 20, 'Pagado'), 
('21', 'VIA001', 'US1004', 21, 'Pagado'), 
('22', 'VIA003', 'US1005', 22, 'Pagado'), 
('23', 'VIA005', 'US1006', 23, 'Pagado'), 
('24', 'VIA007', 'US1007', 24, 'Pagado'), 
('25', 'VIA009', 'US1008', 25, 'Pagado'), 
('26', 'VIA010', 'US1009', 26, 'Pagado'), 
('27', 'VIA011', 'US1010', 27, 'Pagado'), 
('28', 'VIA012', 'US1011', 28, 'Pagado'), 
('29', 'VIA013', 'US1012', 29, 'Pagado'), 
('30', 'VIA014', 'US1013', 30, 'Pagado'), 
('31', 'VIA015', 'US1004', 31, 'Pagado'), 
('32', 'VIA016', 'US1005', 32, 'Pagado'), 
('33', 'VIA017', 'US1006', 33, 'Pagado'), 
('34', 'VIA018', 'US1007', 34, 'Pagado'), 
('35', 'VIA019', 'US1008', 35, 'Pagado'), 
('36', 'VIA020', 'US1009', 36, 'Pagado'), 
('37', 'VIA002', 'US1010', 37, 'Pagado'), 
('38', 'VIA004', 'US1011', 38, 'Pagado'), 
('39', 'VIA006', 'US1012', 39, 'Pagado'), 
('40', 'VIA008', 'US1013', 40, 'Pagado'), 
('41', 'VIA001', 'US1004', 41, 'Pagado'), 
('42', 'VIA003', 'US1005', 42, 'Pagado'), 
('43', 'VIA005', 'US1006', 43, 'Pagado'), 
('44', 'VIA007', 'US1007', 44, 'Pagado'), 
('45', 'VIA009', 'US1008', 45, 'Pagado'), 
('46', 'VIA010', 'US1009', 46, 'Pagado'), 
('47', 'VIA011', 'US1010', 47, 'Pagado'), 
('48', 'VIA012', 'US1011', 48, 'Pagado'), 
('49', 'VIA013', 'US1012', 49, 'Pagado'), 
('50', 'VIA014', 'US1013', 50, 'Pagado'),
('51', 'VIA001', 'US1001', 1, 'Pagado'), 
('52', 'VIA002', 'US1002', 37, 'Pagado'), 
('53', 'VIA003', 'US1003', 2, 'Pagado'), 
('54', 'VIA004', 'US1004', 78, 'Pagado'), 
('55', 'VIA005', 'US1005', 3, 'Pagado'), 
('56', 'VIA006', 'US1006', 39, 'Pagado'), 
('57', 'VIA007', 'US1007', 4, 'Pagado'), 
('58', 'VIA008', 'US1008', 80, 'Pagado'), 
('59', 'VIA009', 'US1009', 5, 'Pagado'), 
('60', 'VIA010', 'US1010', 6, 'Pagado'), 
('61', 'VIA011', 'US1011', 7, 'Pagado'), 
('62', 'VIA012', 'US1012', 8, 'Pagado'), 
('63', 'VIA013', 'US1013', 9, 'Pagado'), 
('64', 'VIA014', 'US1001', 10, 'Pagado'), 
('65', 'VIA015', 'US1002', 11, 'Pagado'), 
('66', 'VIA016', 'US1003', 12, 'Pagado'), 
('67', 'VIA017', 'US1004', 13, 'Pagado'), 
('68', 'VIA018', 'US1005', 14, 'Pagado'), 
('69', 'VIA019', 'US1006', 15, 'Pagado'), 
('70', 'VIA020', 'US1007', 16, 'Pagado'), 
('71', 'VIA001', 'US1008', 17, 'Pagado'), 
('72', 'VIA002', 'US1009', 38, 'Pagado'), 
('73', 'VIA003', 'US1010', 18, 'Pagado'), 
('74', 'VIA004', 'US1011', 79, 'Pagado'), 
('75', 'VIA005', 'US1012', 19, 'Pagado'), 
('76', 'VIA006', 'US1013', 40, 'Pagado'), 
('77', 'VIA007', 'US1001', 20, 'Pagado'), 
('78', 'VIA008', 'US1002', 81, 'Pagado'), 
('79', 'VIA009', 'US1003', 21, 'Pagado'), 
('80', 'VIA010', 'US1004', 22, 'Pagado'), 
('81', 'VIA011', 'US1005', 23, 'Pagado'), 
('82', 'VIA012', 'US1006', 24, 'Pagado'), 
('83', 'VIA013', 'US1007', 25, 'Pagado'), 
('84', 'VIA014', 'US1008', 26, 'Pagado'), 
('85', 'VIA015', 'US1009', 27, 'Pagado'), 
('86', 'VIA016', 'US1010', 28, 'Pagado'), 
('87', 'VIA017', 'US1011', 29, 'Pagado'), 
('88', 'VIA018', 'US1012', 30, 'Pagado'), 
('89', 'VIA019', 'US1013', 31, 'Pagado'), 
('90', 'VIA020', 'US1001', 32, 'Pagado'), 
('91', 'VIA001', 'US1002', 33, 'Pagado'), 
('92', 'VIA002', 'US1003', 57, 'Pagado'), 
('93', 'VIA003', 'US1004', 34, 'Pagado'), 
('94', 'VIA004', 'US1005', 78, 'Pagado'), 
('95', 'VIA005', 'US1006', 35, 'Pagado'), 
('96', 'VIA006', 'US1007', 59, 'Pagado'), 
('97', 'VIA007', 'US1008', 36, 'Pagado'), 
('98', 'VIA008', 'US1009', 80, 'Pagado'), 
('99', 'VIA009', 'US1010', 37, 'Pagado'), 
('100', 'VIA010', 'US1011', 38, 'Pagado'),
('101', 'VIA011', 'US1012', 39, 'Pagado'), 
('102', 'VIA012', 'US1013', 40, 'Pagado'), 
('103', 'VIA013', 'US1001', 41, 'Pagado'), 
('104', 'VIA014', 'US1002', 42, 'Pagado'), 
('105', 'VIA015', 'US1003', 43, 'Pagado'), 
('106', 'VIA016', 'US1004', 44, 'Pagado'), 
('107', 'VIA017', 'US1005', 45, 'Pagado'), 
('108', 'VIA018', 'US1006', 46, 'Pagado'), 
('109', 'VIA019', 'US1007', 47, 'Pagado'), 
('110', 'VIA020', 'US1008', 48, 'Pagado'), 
('111', 'VIA001', 'US1009', 49, 'Pagado'), 
('112', 'VIA002', 'US1010', 59, 'Pagado'), 
('113', 'VIA003', 'US1011', 50, 'Pagado'), 
('114', 'VIA004', 'US1012', 80, 'Pagado'), 
('115', 'VIA005', 'US1013', 51, 'Pagado'), 
('116', 'VIA006', 'US1001', 79, 'Pagado'), 
('117', 'VIA007', 'US1002', 52, 'Pagado'), 
('118', 'VIA008', 'US1003', 81, 'Pagado'), 
('119', 'VIA009', 'US1004', 53, 'Pagado'), 
('120', 'VIA010', 'US1005', 54, 'Pagado'), 
('121', 'VIA011', 'US1006', 55, 'Pagado'), 
('122', 'VIA012', 'US1007', 56, 'Pagado'), 
('123', 'VIA013', 'US1008', 57, 'Pagado'), 
('124', 'VIA014', 'US1009', 58, 'Pagado'), 
('125', 'VIA015', 'US1010', 59, 'Pagado'), 
('126', 'VIA016', 'US1011', 60, 'Pagado'), 
('127', 'VIA017', 'US1012', 61, 'Pagado'), 
('128', 'VIA018', 'US1013', 62, 'Pagado'), 
('129', 'VIA019', 'US1001', 63, 'Pagado'), 
('130', 'VIA020', 'US1002', 64, 'Pagado'), 
('131', 'VIA001', 'US1003', 65, 'Pagado'), 
('132', 'VIA002', 'US1004', 61, 'Pagado'), 
('133', 'VIA003', 'US1005', 66, 'Pagado'), 
('134', 'VIA004', 'US1006', 82, 'Pagado'), 
('135', 'VIA005', 'US1007', 67, 'Pagado'), 
('136', 'VIA006', 'US1008', 63, 'Pagado'), 
('137', 'VIA007', 'US1009', 68, 'Pagado'), 
('138', 'VIA008', 'US1010', 83, 'Pagado'), 
('139', 'VIA009', 'US1011', 69, 'Pagado'), 
('140', 'VIA010', 'US1012', 70, 'Pagado'), 
('141', 'VIA011', 'US1013', 71, 'Pagado'), 
('142', 'VIA012', 'US1001', 72, 'Pagado'), 
('143', 'VIA013', 'US1002', 73, 'Pagado'), 
('144', 'VIA014', 'US1003', 74, 'Pagado'), 
('145', 'VIA015', 'US1004', 75, 'Pagado'), 
('146', 'VIA016', 'US1005', 76, 'Pagado'), 
('147', 'VIA017', 'US1006', 77, 'Pagado'), 
('148', 'VIA018', 'US1007', 78, 'Pagado'), 
('149', 'VIA019', 'US1008', 79, 'Pagado'), 
('150', 'VIA020', 'US1009', 80, 'Pagado');

INSERT INTO venta(COD_VENTA, COD_RESERVA, FECHA_VENTA, MONTO_TOTAL, ESTADO_PAGO) VALUES
('1', '031', '2024-07-05', 110.00, 'Pagado'),
('2', '032', '2024-07-06', 130.00, 'Pagado'),
('3', '033', '2024-07-07', 130.00, 'Pagado'),
('4', '034', '2024-07-08', 130.00, 'Pagado'),
('5', '035', '2024-07-09', 130.00, 'Pagado'),
('6', '036', '2024-07-10', 130.00, 'Pagado'),
('7', '037', '2024-07-11', 106.00, 'Pagado'),
('8', '038', '2024-07-05', 118.00, 'Pagado'),
('9', '039', '2024-07-06', 142.00, 'Pagado'),
('10', '040', '2024-07-07', 178.00, 'Pagado'),
('11', '041', '2024-07-08', 110.00, 'Pagado'),
('12', '042', '2024-07-09', 130.00, 'Pagado'),
('13', '043', '2024-07-10', 160.00, 'Pagado'),
('14', '044', '2024-07-11', 140.00, 'Pagado'),
('15', '045', '2024-07-05', 130.00, 'Pagado'),
('16', '046', '2024-07-06', 130.00, 'Pagado'),
('17', '047', '2024-07-07', 130.00, 'Pagado'),
('18', '048', '2024-07-08', 130.00, 'Pagado'),
('19', '049', '2024-07-09', 130.00, 'Pagado'),
('20', '050', '2024-07-10', 130.00, 'Pagado'),
('21', '001', '2024-07-05', 110.00, 'Pagado'),
('22', '002', '2024-07-06', 130.00, 'Pagado'),
('23', '003', '2024-07-07', 130.00, 'Pagado'),
('24', '004', '2024-07-08', 130.00, 'Pagado'),
('25', '005', '2024-07-09', 130.00, 'Pagado'),
('26', '006', '2024-07-10', 130.00, 'Pagado'),
('27', '007', '2024-07-11', 130.00, 'Pagado'),
('28', '008', '2024-07-05', 130.00, 'Pagado'),
('29', '009', '2024-07-06', 130.00, 'Pagado'),
('30', '010', '2024-07-07', 130.00, 'Pagado'),
('31', '011', '2024-07-08', 130.00, 'Pagado'),
('32', '012', '2024-07-09', 130.00, 'Pagado'),
('33', '013', '2024-07-10', 130.00, 'Pagado'),
('34', '014', '2024-07-11', 130.00, 'Pagado'),
('35', '015', '2024-07-05', 130.00, 'Pagado'),
('36', '016', '2024-07-06', 130.00, 'Pagado'),
('37', '017', '2024-07-07', 130.00, 'Pagado'),
('38', '018', '2024-07-08', 130.00, 'Pagado'),
('39', '019', '2024-07-09', 130.00, 'Pagado'),
('40', '020', '2024-07-10', 130.00, 'Pagado'),
('41', '021', '2024-07-11', 106.00, 'Pagado'),
('42', '022', '2024-07-05', 118.00, 'Pagado'),
('43', '023', '2024-07-06', 142.00, 'Pagado'),
('44', '024', '2024-07-07', 178.00, 'Pagado'),
('45', '025', '2024-07-08', 110.00, 'Pagado'),
('46', '026', '2024-07-09', 130.00, 'Pagado'),
('47', '027', '2024-07-10', 130.00, 'Pagado'),
('48', '028', '2024-07-11', 130.00, 'Pagado'),
('49', '029', '2024-07-05', 130.00, 'Pagado'),
('50', '030', '2024-07-06', 130.00, 'Pagado');

INSERT INTO venta(COD_VENTA, COD_RESERVA, FECHA_VENTA, MONTO_TOTAL, ESTADO_PAGO) VALUES
(51, 51, '2024-02-01', 110.00, 'Pagado'), 
(52, 52, '2024-02-05', 130.00, 'Pagado'), 
(53, 53, '2024-02-08', 160.00, 'Pagado'), 
(54, 54, '2024-02-12', 140.00, 'Pagado'), 
(55, 55, '2024-02-15', 130.00, 'Pagado'), 
(56, 56, '2024-02-18', 130.00, 'Pagado'), 
(57, 57, '2024-02-22', 130.00, 'Pagado'), 
(58, 58, '2024-02-25', 130.00, 'Pagado'), 
(59, 59, '2024-02-28', 130.00, 'Pagado'), 
(60, 60, '2024-02-03', 130.00, 'Pagado'); 


INSERT INTO venta(COD_VENTA, COD_RESERVA, FECHA_VENTA, MONTO_TOTAL, ESTADO_PAGO) VALUES
(61, 61, '2024-03-02', 110.00, 'Pagado'), 
(62, 62, '2024-03-06', 130.00, 'Pagado'), 
(63, 63, '2024-03-09', 160.00, 'Pagado'), 
(64, 64, '2024-03-13', 140.00, 'Pagado'), 
(65, 65, '2024-03-16', 130.00, 'Pagado'), 
(66, 66, '2024-03-19', 130.00, 'Pagado'), 
(67, 67, '2024-03-23', 130.00, 'Pagado'), 
(68, 68, '2024-03-26', 130.00, 'Pagado'), 
(69, 69, '2024-03-29', 130.00, 'Pagado'), 
(70, 70, '2024-03-01', 130.00, 'Pagado'), 
(71, 71, '2024-03-04', 130.00, 'Pagado'), 
(72, 72, '2024-03-07', 130.00, 'Pagado'), 
(73, 73, '2024-03-10', 130.00, 'Pagado'), 
(74, 74, '2024-03-14', 130.00, 'Pagado'), 
(75, 75, '2024-03-17', 130.00, 'Pagado'), 
(76, 76, '2024-03-20', 130.00, 'Pagado'), 
(77, 77, '2024-03-24', 130.00, 'Pagado'), 
(78, 78, '2024-03-27', 130.00, 'Pagado'), 
(79, 79, '2024-03-30', 130.00, 'Pagado'), 
(80, 80, '2024-03-05', 130.00, 'Pagado'); 


INSERT INTO venta(COD_VENTA, COD_RESERVA, FECHA_VENTA, MONTO_TOTAL, ESTADO_PAGO) VALUES
(81, 81, '2024-04-02', 110.00, 'Pagado'), 
(82, 82, '2024-04-06', 130.00, 'Pagado'), 
(83, 83, '2024-04-09', 160.00, 'Pagado'), 
(84, 84, '2024-04-13', 140.00, 'Pagado'), 
(85, 85, '2024-04-16', 130.00, 'Pagado'), 
(86, 86, '2024-04-19', 130.00, 'Pagado'), 
(87, 87, '2024-04-23', 130.00, 'Pagado'), 
(88, 88, '2024-04-26', 130.00, 'Pagado'), 
(89, 89, '2024-04-29', 130.00, 'Pagado'), 
(90, 90, '2024-04-01', 130.00, 'Pagado'), 
(91, 91, '2024-04-04', 130.00, 'Pagado'), 
(92, 92, '2024-04-07', 130.00, 'Pagado'), 
(93, 93, '2024-04-10', 130.00, 'Pagado'), 
(94, 94, '2024-04-14', 130.00, 'Pagado'), 
(95, 95, '2024-04-17', 130.00, 'Pagado'), 
(96, 96, '2024-04-20', 130.00, 'Pagado'), 
(97, 97, '2024-04-24', 130.00, 'Pagado'), 
(98, 98, '2024-04-27', 130.00, 'Pagado'), 
(99, 99, '2024-04-30', 130.00, 'Pagado'), 
(100, 100, '2024-04-05', 130.00, 'Pagado'); 

INSERT INTO venta(COD_VENTA, COD_RESERVA, FECHA_VENTA, MONTO_TOTAL, ESTADO_PAGO) VALUES
(101, 101, '2024-05-02', 110.00, 'Pagado'), 
(102, 102, '2024-05-06', 130.00, 'Pagado'), 
(103, 103, '2024-05-09', 160.00, 'Pagado'), 
(104, 104, '2024-05-13', 140.00, 'Pagado'), 
(105, 105, '2024-05-16', 130.00, 'Pagado'), 
(106, 106, '2024-05-19', 130.00, 'Pagado'), 
(107, 107, '2024-05-23', 130.00, 'Pagado'), 
(108, 108, '2024-05-26', 130.00, 'Pagado'), 
(109, 109, '2024-05-29', 130.00, 'Pagado'), 
(110, 110, '2024-05-01', 130.00, 'Pagado'), 
(111, 111, '2024-05-04', 130.00, 'Pagado'), 
(112, 112, '2024-05-07', 130.00, 'Pagado'), 
(113, 113, '2024-05-10', 130.00, 'Pagado'), 
(114, 114, '2024-05-14', 130.00, 'Pagado'), 
(115, 115, '2024-05-17', 130.00, 'Pagado'), 
(116, 116, '2024-05-20', 130.00, 'Pagado'), 
(117, 117, '2024-05-24', 130.00, 'Pagado'), 
(118, 118, '2024-05-27', 130.00, 'Pagado'), 
(119, 119, '2024-05-30', 130.00, 'Pagado'), 
(120, 120, '2024-05-05', 130.00, 'Pagado'), 
(121, 121, '2024-05-08', 130.00, 'Pagado'), 
(122, 122, '2024-05-11', 130.00, 'Pagado'), 
(123, 123, '2024-05-15', 130.00, 'Pagado'), 
(124, 124, '2024-05-18', 130.00, 'Pagado'), 
(125, 125, '2024-05-21', 130.00, 'Pagado'); 

INSERT INTO venta(COD_VENTA, COD_RESERVA, FECHA_VENTA, MONTO_TOTAL, ESTADO_PAGO) VALUES
(126, 126, '2024-06-02', 110.00, 'Pagado'), 
(127, 127, '2024-06-06', 130.00, 'Pagado'), 
(128, 128, '2024-06-09', 160.00, 'Pagado'), 
(129, 129, '2024-06-13', 140.00, 'Pagado'), 
(130, 130, '2024-06-16', 130.00, 'Pagado'), 
(131, 131, '2024-06-19', 130.00, 'Pagado'), 
(132, 132, '2024-06-23', 130.00, 'Pagado'), 
(133, 133, '2024-06-26', 130.00, 'Pagado'), 
(134, 134, '2024-06-29', 130.00, 'Pagado'), 
(135, 135, '2024-06-01', 130.00, 'Pagado'), 
(136, 136, '2024-06-04', 130.00, 'Pagado'), 
(137, 137, '2024-06-07', 130.00, 'Pagado'), 
(138, 138, '2024-06-10', 130.00, 'Pagado'), 
(139, 139, '2024-06-14', 130.00, 'Pagado'), 
(140, 140, '2024-06-17', 130.00, 'Pagado'), 
(141, 141, '2024-06-20', 130.00, 'Pagado'), 
(142, 142, '2024-06-24', 130.00, 'Pagado'), 
(143, 143, '2024-06-27', 130.00, 'Pagado'), 
(144, 144, '2024-06-30', 130.00, 'Pagado'), 
(145, 145, '2024-06-03', 130.00, 'Pagado'), 
(146, 146, '2024-06-05', 130.00, 'Pagado'), 
(147, 147, '2024-06-08', 130.00, 'Pagado'), 
(148, 148, '2024-06-11', 130.00, 'Pagado'), 
(149, 149, '2024-06-15', 130.00, 'Pagado'), 
(150, 150, '2024-06-18', 130.00, 'Pagado');