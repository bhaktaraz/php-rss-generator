<?php

use Bhaktaraz\RSSGenerator\Item;
use Bhaktaraz\RSSGenerator\Feed;
use Bhaktaraz\RSSGenerator\Channel;

require 'vendor/autoload.php';

$feed = new Feed();
$channel = new Channel();
$channel
    ->title("Channel Title")
    ->description("Channel Description")
    ->url('http://bhaktaraz.com.np')
    ->language('en-US')
    ->copyright('Copyright 2015, Bhaktaraz')
    ->pubDate(strtotime('Tue, 21 Aug 2012 19:50:37 +0900'))
    ->lastBuildDate(strtotime('Tue, 21 Aug 2012 19:50:37 +0900'))
    ->updateFrequency(1)
    ->updatePeriod('hourly')
    ->ttl(60)
    ->appendTo($feed);

$item = new Item();
$item
    ->title("Item Title")
    ->creator("Deepak Pandey")
    ->description("Item body")
    ->content("<p class=\"popPara\" style=\"text-align: justify;\"><a href=\"http://www.onlinekhabar.com/wp-content/uploads/2015/11/kathmandu_view_tower_Old_buspark.jpg\"><img class=\"aligncenter wp-image-349218\" src=\"http://www.onlinekhabar.com/wp-content/uploads/2015/11/kathmandu_view_tower_Old_buspark.jpg\" alt=\"kathmandu_view_tower_Old_buspark\" width=\"810\" height=\"523\" srcset=\"http://www.onlinekhabar.com/wp-content/uploads/2015/11/kathmandu_view_tower_Old_buspark.jpg 650w, http://www.onlinekhabar.com/wp-content/uploads/2015/11/kathmandu_view_tower_Old_buspark-300x194.jpg 300w\" sizes=\"(max-width: 810px) 100vw, 810px\" /></a>२४ जेठ, काठमाडौँ । निर्माण सामग्रीको अभावका कारण पुरानो बसपार्कमा बनाउन लागिएको काठमाडौँ टावरको निर्माण कार्य अन्योलमा परेको छ ।</p>
<p class=\"popPara\" style=\"text-align: justify;\">टावर निर्माणको सम्पूर्ण सामग्री भारतबाट ल्याउनुपर्ने भएकाले निर्माण कार्य सुरु गर्न ढिला भएको निर्माणको जिम्मा पाएको जलेश्वर, स्वछन्द र विकोईका प्रमुख मनोज भेटवालले जानकारी दिए । उनका अनुसार सिमेन्ट, ढुङ्गा, गिट्टी बालुवालगायतको सामग्रीबाहेक अन्य सबै निर्माणका सामान भारतबाट ल्याउनुपर्ने छ ।</p>
<p class=\"popPara\" style=\"text-align: justify;\">हाल पुरानो बसपार्कमा जस्ताले बार्ने भइरहेको छ । भारतबाट आवश्यक सामग्री केही दिनमा आइपुग्ने र सामग्री आयसँगै निर्माण कार्यले गति लिने बताइएको छ ।</p>
<p>निर्माणलाई तीव्ररुपमा अघि बढाउनकै लागि भनी गत वैशाखको पहलो साता पुरानो बसपार्कमा आवतजावत गर्ने सबै यातायातका साधनलाई खुल्लामञ्चमा स्थानान्तरण गरिसकेको छ ।</p>
<p>भूकम्पपश्चात् भवन निर्माणको मापदण्ड फेरबदल भएकाले भवन पूर्णरूपमा भूकम्प प्रतिरोधात्मक र १२ तल्लाको बनाउने तयारी छ । नेपालमा हालसम्म बनेका भवनभन्दा पृथक र अत्याधुनिकसँगै नेपाली कला, संस्कृति झल्किने खालको हुने बताइएको छ ।</p>
<p>कामपासँग गरेको सम्झौताअनुसार ती कम्पनीले आफ्नो लगानीमा भवन बनाएर ३० वर्षसम्म चलाउने छन् । काम सुरु भएको पाँच वर्षभित्र सो टावर बनाइसक्नुपर्ने छ ।</p>
<p>टावरको लागत रु तीन अर्ब ५० करोड पुग्ने अनुमान गरिएको महानगरपालिका प्रवक्ता ज्ञानेन्द्र कार्कीले जातनकारी दिनुभयो । भवनको सबैभन्दा तल्लो तलामा बसको पार्किङ रहने छ । त्यस्तै, त्यसको माथि दुई तलामा हलुका गाडीको पार्किङ, व्यवस्थित सिनेमा हल, पौडी पोखरी, रेस्टुराँ, बैंक तथा महानगरपालिकाको वडा कार्यालयसमेत रहनेछ । भवनका लागि २३ रोपनी पाँच आना जग्गा छुट्याइएको छ ।</p>")
    ->url('http://bhaktaraz.com.np/?p=2')
    ->pubDate(strtotime('Mon, 03 Aug 2015 10:22:02 +0550'))
    ->guid('http://bhaktaraz.com.np/?p=2', true)
    ->appendTo($channel);


echo $feed; // or echo $feed->render();
