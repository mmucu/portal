<?php

namespace churchapp\inspirations;

use Illuminate\Support\Collection;

class inspiring
/*
 * this might not stand for long, just a quick place to put verses to
 * show in the homepage....
 */
{
    public static function quote()
    {
        return Collection::make([

            ' Therefore do not worry about tomorrow, for tomorrow will worry about itself. Each day has enough troubles of its own',
            ' I am here, use me as You wish Lord, coz you are the greatest above all.',
            'One thing I ask of You Lord, this is what I seek, That I will dwell in the house of the Lord all the days of my life, to gaze upon the beauty of the Lord and to seek him in His Temple',
            'Then he said unto them, Go your way, eat the fat, and drink the sweet, and send portions unto them for whom nothing is prepared: for this day is holy unto our Lord: neither be ye sorry; for the joy of the Lord is your strenght.',

            'Do not love the world or anything in the world, If anyone loves the world, love for the Father is not in them: For everything in the world, the lust of the flesh, the lust of the eyes,and the pride of life, comes not from Father but from the world',

            'Do not store up yourselves treasures on earth, where moths and vermin destroy, and where thieves break in and steal',
            'No one can serve two masters. Either you will hate the one and love the other, or you will be devoted to the one and despite the other. You cannot serve both God and Money',
            'But seek first His kingdom and His righteousness, and all things will be given to you as well',
            'The eye is the lamp of the body, if your eyes are healthy, your whole body will be full if light',
            'Have mercy upon me, O God, according to thy lovingkindness: according unto the multitude of thy tender mercies blot out my transgressions',
            'Wash me thoroughly from mine inequity, and cleanse me frommy sin',
            'For I acknowledge my transgressions, and my sin is ever before me',
            'Against thee,thee only, have I sinned, and done this evil in thy sight: that thou mightest be justified when thou speakest, and be clear when thou judgest',
            'Behold, I wass shapen in iniquity, and in sin did my mother concieve me',
            'Thou desirest truth in the inward parts, and in the hidden part shalt make me to know wisdom',
            ' Purge me with Hyssop, and I shall be clean, wash me and I shall be whiter than snow',
            'Make me to hear the joy and gladness, that the bones which thou hast broken may rejoice',
            'Hide thy face from my sins, and blot out all mine iniquities',
            'Cast me not away fromthy presence,a dn take not thy holy spirit from me',
            ' Restore in me the joy of thy salvation, and uphold me with thy free spirit',
            'Then will I teach transgressors thy ways, and sinners shall be converted unto thee',
            'Deliver me from bloodguiltiness, O God, thou God of my salvation, and my tongue shall sing aloud of thy righteousness',
            'O Lord, open thou my lips, and my mouth shall shew fourth thy prise.',
            'For though desirest not sacrifice, else would I give it: thou delightest not in burnt offering.',
            'The sacrifice of God is a broken spirit, a broken and contrite heart, O God, thou wilt not despise',
            'Do good in thy pleasure unto Zion, build thou the walls of Jerusalem',
            'Then shall thou be pleased with the sacrifices of righteousness, with burnt offering and whole burnt offering: then shall they offer bullocks upon thy alter',
            'Whoever conceals their sins does not prosper, but the one who confesses and renounces finds mercy',
            ' Blessed is one who always trembles before God, but whoever hardens their heart finds trouble',
            'The one who walks in blameless is kept safe, but the one whose ways are perverse will fall into the pit',
            'Those who give to the poor will lack nothing, but those who close their eyes to them recieve many curses',


        ])->random();
    }

}