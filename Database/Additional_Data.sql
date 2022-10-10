USE information_schema;

-- use information_schema;
-- DROP DATABASE IF EXISTS trust_engine;
-- CREATE DATABASE trust_engine;

USE trust_engine;
SET FOREIGN_KEY_CHECKS = 0;


DROP TABLE IF EXISTS `matrix`;
CREATE TABLE `matrix`
(
    `id`         bigint(20) UNSIGNED
                             NOT NULL
        AUTO_INCREMENT
        COMMENT 'Primary Key for Table.',
    `name`       varchar(50) NOT NULL,
    `abv`        varchar(2)  NOT NULL,
    `mg`         char(3)     NOT NULL,
    `mg_ffl`     tinyint(1)
                             NOT NULL
                             DEFAULT 0
        COMMENT 'Checkbox value for this Boolean Column.',
    `mg_flag`    tinyint(1)
                             NOT NULL
                             DEFAULT 0
        COMMENT 'Checkbox value for this Boolean Column.',
    `supp`       char(3)     NOT NULL,
    `supp_ffl`   tinyint(1)
                             NOT NULL
                             DEFAULT 0
        COMMENT 'Checkbox value for this Boolean Column.',
    `supp_flag`  tinyint(1)
                             NOT NULL
                             DEFAULT 0
        COMMENT 'Checkbox value for this Boolean Column.',
    `sbr`        char(3)     NOT NULL,
    `sbr_ffl`    tinyint(1)
                             NOT NULL
                             DEFAULT 0
        COMMENT 'Checkbox value for this Boolean Column.',
    `sbr_flag`   tinyint(1)
                             NOT NULL
                             DEFAULT 0
        COMMENT 'Checkbox value for this Boolean Column.',
    `sbs`        char(3)     NOT NULL,
    `sbs_ffl`    tinyint(1)
                             NOT NULL
                             DEFAULT 0
        COMMENT 'Checkbox value for this Boolean Column.',
    `sbs_flag`   tinyint(1)
                             NOT NULL
                             DEFAULT 0
        COMMENT 'Checkbox value for this Boolean Column.',
    `aow`        char(3)     NOT NULL,
    `aow_ffl`    tinyint(1)
                             NOT NULL
                             DEFAULT 0
        COMMENT 'Checkbox value for this Boolean Column.',
    `aow_flag`   tinyint(1)
                             NOT NULL
                             DEFAULT 0
        COMMENT 'Checkbox value for this Boolean Column.',
    `dd`         char(3)     NOT NULL,
    `dd_ffl`     tinyint(1)
                             NOT NULL
                             DEFAULT 0
        COMMENT 'Checkbox value for this Boolean Column.',
    `dd_flag`    tinyint(1)
                             NOT NULL
                             DEFAULT 0
        COMMENT 'Checkbox value for this Boolean Column.',
    `notes`      longtext
                     CHARACTER SET utf8mb4
                         COLLATE utf8mb4_unicode_ci
                             DEFAULT NULL,
    `is_state`   char(1)     DEFAULT NULL,
    `is_lower48` char(1)     DEFAULT NULL,
    `slug`       varchar(64) NOT NULL,
    `latitude`   float(9, 6) DEFAULT NULL,
    `longitude`  float(9, 6) DEFAULT NULL,
    `population` int(11)     DEFAULT NULL,
    `area`       double      DEFAULT NULL,
    PRIMARY KEY (`id`)
)
    ENGINE = MyISAM
    AUTO_INCREMENT = 100
    DEFAULT CHARSET = utf8;

-- SELECT * FROM itrust_user.matrix;

INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (1, 'Alabama', 'AL', 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0,
        'AOWs disguised as walking canes are illegal', 'y', 'y', 'indiana', 39.84943, -86.25828, 6483802,
        35866.8984375);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (2, 'Alaska', 'AK', 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, null, 'y', 'y',
        'iowa', 42.01154, -93.21053, 3046355, 55869.359375);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (3, 'Arizona', 'AZ', 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, null, 'y',
        'y', 'kansas', 38.5266, -96.72649, 2853118, 81814.8828125);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (4, 'Arkansas', 'AR', 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0,
        'MGs may not have ammunition bigger than .30 in. or 7.63 mm unless the gun is registered to an ammunition corporation',
        'y', 'y', 'kentucky', 37.66814, -84.67007, 4339367, 39728.1796875);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (5, 'California', 'CA', 'Yes', 0, 1, 'No', 0, 0, 'No', 1, 1, 'Yes', 1, 1, 'Yes', 0, 0, 'Yes', 1, 1,
        'MGs, SBRs and SBSs may be obtained with a "Dangerous Weapons Permit" but it is rarely granted. DDs, SBRs and SBSs on the C&R list may be obtained with a C&R FFL',
        'n', 'n', 'district-of-columbia', 38.89744, -77.02682, 601723, 68.3399963378906);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (6, 'Colorado', 'CO', 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, null, 'y',
        'y', 'louisiana', 31.16955, -91.86781, 4533372, 43561.8515625);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (7, 'Connecticut', 'CT', 'No', 0, 1, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0,
        'SBR, SBS, DD, suppressors are legal, provided they also comply with the assault weapons provisions, unless purchased before October 1, 1993. Machine guns are legal if purchased and registered with the state before January 1, 2014.',
        'y', 'y', 'georgia', 33.04062, -83.64307, 9687653, 57906.140625);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (8, 'Delaware', 'DE', 'No', 0, 0, 'No', 0, 0, 'Yes', 0, 0, 'No', 0, 0, 'Yes', 0, 0, 'No', 0, 0,
        'SBRs are illegal within the city limits of Willmington', 'y', 'y', 'california', 36.1162, -119.6816, 37253956,
        155939.515625);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (9, 'District of Columbia', 'DC', 'No', 0, 0, 'No', 0, 0, 'No', 0, 0, 'No', 0, 0, 'No', 0, 0, 'No', 0, 0, null,
        'y', 'y', 'alabama', 32.80667, -86.79113, 4779736, 50744);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (10, 'Florida', 'FL', 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, null, 'y',
        'y', 'maine', 44.69395, -69.38193, 1328361, 30861.55078125);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (11, 'Georgia', 'GA', 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, null, 'y',
        'y', 'maryland', 39.06395, -76.8021, 5773552, 9773.8203125);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (12, 'Hawaii', 'HI', 'No', 0, 0, 'No', 0, 0, 'No', 0, 0, 'No', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, null, 'y', 'y',
        'colorado', 39.05981, -105.3111, 5029196, 103717.53125);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (13, 'Idaho', 'ID', 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, null, 'y', 'y',
        'massachusetts', 42.23017, -71.53011, 6547629, 7840.02001953125);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (14, 'Illinois', 'IL', 'No', 0, 0, 'No', 0, 0, 'Yes', 0, 0, 'No', 0, 0, 'Yes', 0, 0, 'Yes', 1, 1,
        'SBRs allowed only for C&R license holders. Only large-bore DDs are allowed', 'y', 'y', 'connecticut', 41.59778,
        -72.75537, 3574097, 4844.7998046875);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (15, 'Indiana', 'IN', 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, null, 'y',
        'y', 'michigan', 43.32662, -84.53609, 9883640, 56803.8203125);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (16, 'Iowa', 'IA', 'No', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'No', 0, 0, 'No', 0, 0, null, 'y', 'y',
        'arizona', 33.72976, -111.4312, 6392017, 113634.5703125);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (17, 'Kansas', 'KS', 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, null, 'y',
        'y', 'minnesota', 45.69445, -93.90019, 5303925, 79610.078125);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (18, 'Kentucky', 'KY', 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, null, 'y',
        'y', 'mississippi', 32.74165, -89.6787, 2967297, 46906.9609375);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (19, 'Louisiana', 'LA', 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, null, 'y',
        'y', 'missouri', 38.45609, -92.28837, 5988927, 68885.9296875);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (20, 'Maine', 'ME', 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, null, 'y', 'y',
        'montana', 46.92192, -110.4544, 989415, 145552.4375);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (21, 'Maryland', 'MD', 'Yes', 0, 1, 'Yes', 0, 0, 'Yes', 0, 1, 'Yes', 0, 1, 'Yes', 0, 0, 'Yes', 0, 0,
        'Machine guns must be registered with the state police within 48 hours of taking possession. Short barrel rifles must be greater than 29" OAL unless possessed and made before Oct 1, 2013 (rimfires are an exception). SBRs and SBSs cannot be "copycat weapons" as defined by their AWB. Some classes of MGs may be unable to be purchased beginning 10/1/2018 due to a new bump stock ban.',
        'y', 'y', 'illinois', 40.34946, -88.98614, 12830632, 55583.578125);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (22, 'Massachusetts', 'MA', 'Yes', 0, 1, 'No', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 1,
        'Some destructive devices are banned at the state level, while others are banned at a local level. DD''s can be completely illegal or legal depending on what town you live in. A machine gun license is required to possess a MG.',
        'y', 'y', 'florida', 27.76628, -81.68678, 18801310, 53926.8203125);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (23, 'Michigan', 'MI', 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0,
        'All guns that are shorter than 26" in the shortest usable condition(SBS, SBR, AOW, handguns, firearms, and MGs) must be registered as pistols with the police.',
        'y', 'y', 'nebraska', 41.12537, -98.26808, 1826341, 76872.40625);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (24, 'Minnesota', 'MN', 'Yes', 1, 1, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 1, 1, 'Yes', 0, 0, 'Yes', 0, 1,
        'Machine guns and short-barreled shotguns, unless designated Curios & Relics, are prohibited. Some destructive devices are prohibited.',
        'y', 'y', 'wyoming', 42.75597, -107.3025, 563626, 97100.3984375);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (25, 'Mississippi', 'MS', 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, null,
        'y', 'y', 'nevada', 38.31351, -117.0554, 2700551, 109825.9921875);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (26, 'Missouri', 'MO', 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, null, 'y',
        'y', 'new-hampshire', 43.45249, -71.5639, 1316470, 8968.099609375);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (27, 'Montana', 'MT', 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, null, 'y',
        'y', 'new-jersey', 40.2989, -74.52101, 8791894, 7417.33984375);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (28, 'Nebraska', 'NE', 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, null, 'y',
        'y', 'new-mexico', 34.84052, -106.2485, 2059179, 121355.53125);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (29, 'Nevada', 'NV', 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, null, 'y',
        'y', 'new-york', 42.16573, -74.94805, 19378102, 47213.7890625);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (30, 'New Hampshire', 'NH', 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, null,
        'y', 'y', 'north-carolina', 35.63007, -79.80642, 9535483, 48710.87890625);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (31, 'New Jersey', 'NJ', 'Yes', 0, 1, 'No', 0, 0, 'No', 0, 0, 'No', 0, 0, 'Yes', 0, 0, 'No', 0, 0,
        'Possession of a machine gun requires a state license, which is granted on a may issue basis by a county superior court judge. Machine gun licenses are extremely difficult to obtain.',
        'y', 'y', 'arkansas', 34.9697, -92.37312, 2915918, 52068.171875);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (32, 'New Mexico', 'NM', 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, null, 'y',
        'y', 'north-dakota', 47.52891, -99.78401, 672591, 68975.9296875);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (33, 'New York', 'NY', 'No', 0, 0, 'No', 0, 0, 'No', 0, 0, 'No', 0, 0, 'yes', 0, 1, 'Yes', 0, 1,
        'Destructive devices are permitted except for rockets with greater than 3 ounces of propellant, which are prohibited. AOW''s are legal to own but are still required to be on a pistol permit. AOW''s disguised as non-firearms are illegal.',
        'y', 'y', 'wisconsin', 44.26854, -89.61651, 5686986, 54310.1015625);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (34, 'North Carolina', 'NC', 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, null,
        'y', 'y', 'ohio', 40.38878, -82.76492, 11536504, 40948.37890625);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (35, 'North Dakota', 'ND', 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, null,
        'y', 'y', 'oklahoma', 35.56534, -96.92892, 3751351, 68667.0625);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (36, 'Ohio', 'OH', 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, null, 'y', 'y',
        'oregon', 44.57202, -122.0709, 3831074, 95996.7890625);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (37, 'Oklahoma', 'OK', 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, null, 'y',
        'y', 'pennsylvania', 40.59075, -77.20975, 12702379, 44816.609375);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (38, 'Oregon', 'OR', 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, null, 'y',
        'y', 'rhode-island', 41.68089, -71.51178, 1052567, 1044.93005371094);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (39, 'Pennsylvania', 'PA', 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 1,
        'Bombs are prohibited as Offensive Weapons', 'y', 'n', 'hawaii', 21.09432, -157.4983, 1360301, 6422.6201171875);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (40, 'Rhode Island', 'RI', 'No', 0, 0, 'No', 0, 0, 'No', 0, 0, 'No', 0, 0, 'No', 0, 0, 'No', 0, 0, null, 'y',
        'n', 'alaska', 61.37072, -152.4044, 710231, 571951.25);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (41, 'South Carolina', 'SC', 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, null,
        'y', 'y', 'south-carolina', 33.85689, -80.94501, 4625364, 30109.470703125);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (42, 'South Dakota', 'SD', 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, null,
        'y', 'y', 'south-dakota', 44.29978, -99.43883, 814180, 75884.640625);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (43, 'Tennessee', 'TN', 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, null, 'y',
        'y', 'tennessee', 35.74784, -86.69234, 6346105, 41217.12109375);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (44, 'Texas', 'TX', 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, null, 'y', 'y',
        'texas', 31.05449, -97.56346, 25145561, 261797.125);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (45, 'Utah', 'UT', 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, null, 'y', 'y',
        'utah', 40.15003, -111.8624, 2763885, 82143.6484375);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (46, 'Vermont', 'VT', 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, null, 'y',
        'y', 'vermont', 44.04588, -72.71069, 625741, 9249.5595703125);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (47, 'Virginia', 'VA', 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 1,
        'Fully-automatic firearms (machine guns) must be registered with the state police. Plastic firearms and some destructive devices (such as the striker 12 shotgun) are prohibited outside law enforcement',
        'y', 'y', 'idaho', 44.24046, -114.4788, 1567582, 82747.2109375);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (48, 'Washington', 'WA', 'No', 0, 1, 'Yes', 0, 0, 'Yes', 0, 0, 'No', 0, 1, 'Yes', 0, 0, 'Yes', 0, 0,
        'Machine guns and short-barreled shotguns, unless purchased before July 1, 1994, are illegal for non-law-enforcement possession.',
        'y', 'y', 'delaware', 39.31852, -75.50714, 897934, 1953.56005859375);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (49, 'West Virginia', 'WV', 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, null,
        'y', 'y', 'virginia', 37.76934, -78.16997, 8001024, 39594.0703125);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (50, 'Wisconsin', 'WI', 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0,
        'Machine guns allowed, but may not shoot pistol cartridges and may not be possessed aggressively or offensively.',
        'y', 'y', 'washington', 47.4009, -121.4905, 6724540, 66544.0625);
INSERT INTO matrix(id, name, abv, mg, mg_ffl, mg_flag, supp, supp_ffl, supp_flag, sbr, sbr_ffl, sbr_flag, sbs, sbs_ffl,
                   sbs_flag, aow, aow_ffl, aow_flag, dd, dd_ffl, dd_flag, notes, is_state, is_lower48, slug, latitude,
                   longitude, population, area)
VALUES (51, 'Wyoming', 'WY', 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, 'Yes', 0, 0, null, 'y',
        'y', 'west-virginia', 38.49123, -80.95445, 1852994, 24077.73046875);


SET FOREIGN_KEY_CHECKS = 1;





SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `license_type`;
CREATE TABLE `license_type`
(
    `id`              bigint(20) UNSIGNED
                      NOT NULL
                      AUTO_INCREMENT
                      COMMENT 'Primary Key for Table.',
    `type`            Char(2)      NOT NULL,
    `description`     varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
)
    ENGINE = MyISAM
    DEFAULT CHARSET = utf8;

INSERT INTO license_type(type, description) VALUES ('01', 'Dealer in Firearms Other Than Destructive Devices (Includes Gunsmiths)');
INSERT INTO license_type(type, description) VALUES ('02', 'Pawnbroker in Firearms Other Than Destructive Devices');
INSERT INTO license_type(type, description) VALUES ('03', 'Collector of Curios and Relics');
INSERT INTO license_type(type, description) VALUES ('06', 'Manufacturer of Ammunition for Firearms');
INSERT INTO license_type(type, description) VALUES ('07', 'Manufacturer of Firearms Other Than Destructive Devices');
INSERT INTO license_type(type, description) VALUES ('08', 'Importer of Firearms Other Than Destructive Devices');
INSERT INTO license_type(type, description) VALUES ('09', 'Dealer in Destructive Devices');
INSERT INTO license_type(type, description) VALUES ('10', 'Manufacturer of Destructive Devices');
INSERT INTO license_type(type, description) VALUES ('11', 'Importer of Destructive Devices');
SET FOREIGN_KEY_CHECKS = 1;






SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions`
(
    `sess_id`       VARBINARY(128)   NOT NULL PRIMARY KEY,
    `sess_data`     MEDIUMBLOB       NOT NULL,
    `sess_lifetime` INTEGER UNSIGNED NOT NULL,
    `sess_time`     INTEGER UNSIGNED NOT NULL,
    INDEX `sessions_sess_lifetime_idx` (`sess_lifetime`)
) COLLATE utf8mb4_bin,
  ENGINE = InnoDB;
SET FOREIGN_KEY_CHECKS = 1;


SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `geo_states`;
CREATE TABLE `geo_states` (
  `id` bigint unsigned  auto_increment NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `abv` char(2) NOT NULL DEFAULT '',
  `country` char(2) NOT NULL,
  `is_state` char(1) DEFAULT NULL,
  `is_lower48` char(1) DEFAULT NULL,
  `slug` varchar(50) NOT NULL,
  `latitude` float(9,6) DEFAULT NULL,
  `longitude` float(9,6) DEFAULT NULL,
  `population` bigint unsigned DEFAULT NULL,
  `area` float(8,2) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



INSERT INTO `geo_states` (`name`,`abv`,`country`,`is_state`,`is_lower48`,`slug`,`latitude`,`longitude`,`population`,`area`) VALUES 
('Alabama','AL','US','y','y','alabama',32.806671,-86.791130,4779736,50744.00),
('Alaska','AK','US','y','n','alaska',61.370716,-152.404419,710231,571951.25),
('Arizona','AZ','US','y','y','arizona',33.729759,-111.431221,6392017,113634.57),
('Arkansas','AR','US','y','y','arkansas',34.969704,-92.373123,2915918,52068.17),
('California','CA','US','y','y','california',36.116203,-119.681564,37253956,155939.52),
('Colorado','CO','US','y','y','colorado',39.059811,-105.311104,5029196,103717.53),
('Connecticut','CT','US','y','y','connecticut',41.597782,-72.755371,3574097,4844.80),
('Delaware','DE','US','y','y','delaware',39.318523,-75.507141,897934,1953.56),
('District of Columbia','DC','US','n','n','district-of-columbia',38.897438,-77.026817,601723,68.34),
('Florida','FL','US','y','y','florida',27.766279,-81.686783,18801310,53926.82),
('Georgia','GA','US','y','y','georgia',33.040619,-83.643074,9687653,57906.14),
('Hawaii','HI','US','y','n','hawaii',21.094318,-157.498337,1360301,6422.62),
('Idaho','ID','US','y','y','idaho',44.240459,-114.478828,1567582,82747.21),
('Illinois','IL','US','y','y','illinois',40.349457,-88.986137,12830632,55583.58),
('Indiana','IN','US','y','y','indiana',39.849426,-86.258278,6483802,35866.90),
('Iowa','IA','US','y','y','iowa',42.011539,-93.210526,3046355,55869.36),
('Kansas','KS','US','y','y','kansas',38.526600,-96.726486,2853118,81814.88),
('Kentucky','KY','US','y','y','kentucky',37.668140,-84.670067,4339367,39728.18),
('Louisiana','LA','US','y','y','louisiana',31.169546,-91.867805,4533372,43561.85),
('Maine','ME','US','y','y','maine',44.693947,-69.381927,1328361,30861.55),
('Maryland','MD','US','y','y','maryland',39.063946,-76.802101,5773552,9773.82),
('Massachusetts','MA','US','y','y','massachusetts',42.230171,-71.530106,6547629,7840.02),
('Michigan','MI','US','y','y','michigan',43.326618,-84.536095,9883640,56803.82),
('Minnesota','MN','US','y','y','minnesota',45.694454,-93.900192,5303925,79610.08),
('Mississippi','MS','US','y','y','mississippi',32.741646,-89.678696,2967297,46906.96),
('Missouri','MO','US','y','y','missouri',38.456085,-92.288368,5988927,68885.93),
('Montana','MT','US','y','y','montana',46.921925,-110.454353,989415,145552.44),
('Nebraska','NE','US','y','y','nebraska',41.125370,-98.268082,1826341,76872.41),
('Nevada','NV','US','y','y','nevada',38.313515,-117.055374,2700551,109825.99),
('New Hampshire','NH','US','y','y','new-hampshire',43.452492,-71.563896,1316470,8968.10),
('New Jersey','NJ','US','y','y','new-jersey',40.298904,-74.521011,8791894,7417.34),
('New Mexico','NM','US','y','y','new-mexico',34.840515,-106.248482,2059179,121355.53),
('New York','NY','US','y','y','new-york',42.165726,-74.948051,19378102,47213.79),
('North Carolina','NC','US','y','y','north-carolina',35.630066,-79.806419,9535483,48710.88),
('North Dakota','ND','US','y','y','north-dakota',47.528912,-99.784012,672591,68975.93),
('Ohio','OH','US','y','y','ohio',40.388783,-82.764915,11536504,40948.38),
('Oklahoma','OK','US','y','y','oklahoma',35.565342,-96.928917,3751351,68667.06),
('Oregon','OR','US','y','y','oregon',44.572021,-122.070938,3831074,95996.79),
('Pennsylvania','PA','US','y','y','pennsylvania',40.590752,-77.209755,12702379,44816.61),
('Rhode Island','RI','US','y','y','rhode-island',41.680893,-71.511780,1052567,1044.93),
('South Carolina','SC','US','y','y','south-carolina',33.856892,-80.945007,4625364,30109.47),
('South Dakota','SD','US','y','y','south-dakota',44.299782,-99.438828,814180,75884.64),
('Tennessee','TN','US','y','y','tennessee',35.747845,-86.692345,6346105,41217.12),
('Texas','TX','US','y','y','texas',31.054487,-97.563461,25145561,261797.12),
('Utah','UT','US','y','y','utah',40.150032,-111.862434,2763885,82143.65),
('Vermont','VT','US','y','y','vermont',44.045876,-72.710686,625741,9249.56),
('Virginia','VA','US','y','y','virginia',37.769337,-78.169968,8001024,39594.07),
('Washington','WA','US','y','y','washington',47.400902,-121.490494,6724540,66544.06),
('West Virginia','WV','US','y','y','west-virginia',38.491226,-80.954453,1852994,24077.73),
('Wisconsin','WI','US','y','y','wisconsin',44.268543,-89.616508,5686986,54310.10),
('Wyoming','WY','US','y','y','wyoming',42.755966,-107.302490,563626,97100.40);


SET FOREIGN_KEY_CHECKS = 1;