CREATE  TABLE  IF NOT EXISTS `gallery` (
    `idGallery` int(11) NOT NULL AUTO_INCREMENT,
    `titleGallery` varchar(100) NOT NULL,
    `descGallery` varchar(255) NOT NULL,
    `imgFullNameGallery` varchar(500) NOT NULL,
    `orderGallery` int(11) NOT NULL,
    PRIMARY KEY(`idGallery`)
    )ENGINE = InnoDB DEFAULT CHARSET = latin1 AUTO_INCREMENT=4;

INSERT INTO gallery (idGallery, titleGallery, descGallery, imgFullNameGallery, orderGallery) VALUES
(1, 'Mu One', 'Mu Dep', 'mu1.jpg', 1),
(2, 'Mu Two', 'Nguoi Dep', 'mu2.jpg', 2),
(3, 'Giay Sin', 'Phong cach', 'giay-af1.jpg', 3);
