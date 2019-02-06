SELECT p.id_pedido, tp.descripcion AS 'tipoPedido', p.fechaalta, p.titulo, p.descripcion, dep.descripcion AS 'dependenciaOrigen'
FROM pedido AS p
JOIN tipopedido AS tp ON tp.id_tipopedido = p.id_tipopedido
JOIN dependencia AS dep ON dep.id_dependencia = p.dependenciaorigen
WHERE p.activo=1



SELECT DATE_FORMAT("2017-06-15 23:50:00", "%d/%m/%Y %H:%i"); 
SELECT `p`.`id_pedido`, tp.descripcion AS 'tipoPedido', (p.fechaalta, '%d/%m/%Y %H:%i') AS fechaalta,(mp.fechamovimiento, '%d/%m/%Y %H:%i') AS fechamovimiento,`p`.`titulo`, `p`.`descripcion`, dep.descripcion AS 'dependenciaOrigen' FROM `pedido` AS `p` JOIN `tipopedido` AS `tp` ON `tp`.`id_tipopedido` = `p`.`id_tipopedido` JOIN `dependencia` AS `dep` ON `dep`.`id_dependencia` = `p`.`dependenciaorigen` WHERE `p`.`activo` = 1 LIMIT 50
SELECT p.id_pedido, tp.descripcion AS 'tipoPedido', p.fechaalta, p.titulo, p.descripcion,DATE_FORMAT(mp.fechamovimiento, '%d/%m/%Y %H:%i') 
ori.descripcion AS 'dependenciaOrigen',
dest.descripcion AS 'dependenciaDestino'
FROM pedido AS p
JOIN tipopedido AS tp       ON tp.id_tipopedido = p.id_tipopedido
JOIN dependencia AS ori     ON ori.id_dependencia = p.dependenciaorigen
JOIN movimientopedido AS mp ON mp.id_pedido = p.id_pedido
JOIN tipomovimiento AS tmov ON tmov.id_tipomovimiento = mp.id_tipomovimiento
JOIN estadopedido AS ep ON ep.id_estadopedido = mp.id_estadopedido 
JOIN dependencia AS dest ON dest.id_dependencia = mp.dependenciadestino 
WHERE p.activo=1

SELECT *
FROM movimientopedido AS mp 
JOIN pedido AS p ON p.id_pedido= mp.id_pedido
JOIN dependencia AS ori ON ori.id_dependencia = p.dependenciaorigen
JOIN dependencia AS dest ON dest.id_dependencia = mp.dependenciadestino
WHERE mp.id_pedido= 3 
