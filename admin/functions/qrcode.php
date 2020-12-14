<?php


    include('qrcode/qrlib.php');
    //include('config.php');

    // how to build raw content - QRCode with detailed Business Card (VCard)

    $tempDir = './tmp';

    // here our data
    $name         = 'Magdalena Panak';
    $sortName     = 'Panak;Magdalena';
    $phone        = '(48)504-569-574';
    $phonePrivate = '(48)42-235-34-54';
    $phoneCell    = '(48)667-67-27-37';
    $orgName      = 'MSV the best offers for used machines';

    $email        = 'meg@msv.com.pl';

    // if not used - leave blank!
    $addressLabel     = '';
    $addressPobox     = '';
    $addressExt       = 'Mayer & Cie MPU 1.6';
    $addressStreet    = 'year 2003';
    $addressTown      = 'Ref. 324';
    $addressRegion    = '';
    $addressPostCode  = '';
    $addressCountry   = '';

    // we building raw data
    $codeContents  = 'BEGIN:VCARD'."\n";
    $codeContents .= 'VERSION:2.1'."\n";
    $codeContents .= 'N:'.$sortName."\n";
    $codeContents .= 'FN:'.$name."\n";
    $codeContents .= 'ORG:'.$orgName."\n";

    $codeContents .= 'TEL;WORK;VOICE:'.$phone."\n";
    $codeContents .= 'TEL;HOME;VOICE:'.$phonePrivate."\n";
    $codeContents .= 'TEL;TYPE=cell:'.$phoneCell."\n";

    $codeContents .= 'ADR;TYPE=work;'.
        'LABEL="'.$addressLabel.'":'
        .$addressPobox.';'
        .$addressExt.';'
        .$addressStreet.';'
        .$addressTown.';'
        .$addressPostCode.';'
        .$addressCountry
    ."\n";

    $codeContents .= 'EMAIL:'.$email."\n";

    $codeContents .= 'END:VCARD';

    // generating
    QRcode::png($codeContents, 'qr.png', QR_ECLEVEL_L, 3);

    // displaying
    echo '<img src="'.$tempDir.'026.png" />'; 
?>