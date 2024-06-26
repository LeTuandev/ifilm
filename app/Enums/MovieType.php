<?php

namespace App\Enums;

enum MovieType: int
{
    case ACTION_MOVIE = 0;
    case ADVENTURE_MOVIE = 1;
    case BIOGRAPHY = 2;
    case CARTOON = 3;
    case COMEDY = 4;
    case COURTROOM_DRAMA = 5;
    case CRIME_AND_GANGSTER_FILM = 6;
    case DOCUMENTARY = 7;
    case DRAMA_MOVIE = 8;
    case FAMILY_MOVIE = 9;
    case HISTORICAL_MOVIE = 10;
    case HORROR_MOVIE = 11;
    case MUSICAL_MOVIE = 12;
    case ROMANCE_MOVIE = 13;
    case SCIENCE_FICTION_MOVIE = 14;
    case SITCOM_MOVIE = 15;
    case THRILLER = 16;
    case TRAGEDY_MOVIE = 17;
    case WAR_MOVIE = 18;
    case WASTERNS_MOVIE = 19;

    public function getNameOfType(): string
    {
        return match($this) {
            self::ACTION_MOVIE => 'phim hành động',
            self::ADVENTURE_MOVIE => 'phim phiêu lưu, mạo hiểm',
            self::BIOGRAPHY => 'phim về tiểu sử',
            self::CARTOON => 'phim hoạt hình',
            self::COMEDY => '	phim hài',
            self::COURTROOM_DRAMA => 'phim trinh thám hình sự',
            self::CRIME_AND_GANGSTER_FILM => 'Phim hình sự',
            self::DOCUMENTARY => 'phim tài liệu',
            self::DRAMA_MOVIE => 'phim chính kịch',
            self::FAMILY_MOVIE => 'phim gia đình',
            self::HISTORICAL_MOVIE => 'phim cổ trang',
            self::HORROR_MOVIE => 'phim kinh dị',
            self::MUSICAL_MOVIE => 'phim ca nhạc',
            self::ROMANCE_MOVIE => 'phim tâm lý tình cảm',
            self::SCIENCE_FICTION_MOVIE => 'phim khoa học viễn tưởng',
            self::SITCOM_MOVIE => 'Phim hài dài tập',
            self::THRILLER => 'phim giật gân, ly kỳ',
            self::TRAGEDY_MOVIE => 'phim bi kịch',
            self::WAR_MOVIE => 'Phim về chiến tranh',
            self::WASTERNS_MOVIE => 'Phim miền Tây',
        }; 
    }
}
