
SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `perfil` int NOT NULL,
  `escuela` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nombres` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `apellidos` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `codigo` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `correo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `usuario` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES (1, 1, 'EPIS', 'rodolfo', 'riveros mitma', '1001420172', 'riverosmitma123@gmail.com', 'rodo', '202cb962ac59075b964b07152d234b70');
INSERT INTO `usuario` VALUES (3, 2, 'EPIA', 'ana', 'gonzales', '3216547887', 'ana@gmail.com', 'ana', '276b6c4692e78d4799c12ada515bc3e4');
INSERT INTO `usuario` VALUES (7, 2, 'EPIS', 'julia', 'julia', '654', 'julia@gmail.com', 'julia', 'c2e285cb33cecdbeb83d2189e983a8c0');
INSERT INTO `usuario` VALUES (8, 2, 'EPIS', 'julia', 'julia', '654', 'julia@gmail.com', 'julia', 'c2e285cb33cecdbeb83d2189e983a8c0');
INSERT INTO `usuario` VALUES (9, 2, 'EPIS', 'julia', 'julia', '654', 'julia@gmail.com', 'julia', 'c2e285cb33cecdbeb83d2189e983a8c0');
INSERT INTO `usuario` VALUES (10, 2, 'EPIS', 'julia', 'julia', '654', 'julia@gmail.com', 'julia', 'c2e285cb33cecdbeb83d2189e983a8c0');
INSERT INTO `usuario` VALUES (11, 2, 'EPIS', 'julia', 'julia', '654', 'julia@gmail.com', 'julia', 'c2e285cb33cecdbeb83d2189e983a8c0');

-- ----------------------------
-- Table structure for cita
-- ----------------------------
DROP TABLE IF EXISTS `cita`;
CREATE TABLE `cita`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `especialidad` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fechaHora` datetime(0) NULL DEFAULT NULL,
  `emergencia` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `usuario_id` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `cita_usuario_id_fk`(`usuario_id`) USING BTREE,
  CONSTRAINT `cita_usuario_id_fk` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cita
-- ----------------------------
INSERT INTO `cita` VALUES (1, 'traumatologia', '2021-01-24 17:28:17', 'si', 3);
INSERT INTO `cita` VALUES (2, 'traumatologia', '2021-01-25 17:28:48', 'si', 3);

-- ----------------------------
-- Table structure for usuario
-- ----------------------------


SET FOREIGN_KEY_CHECKS = 1;
