<?php

// folder to check
$dir = '/';

// get disk space free (in bytes)
$disk_free = disk_free_space($dir);

// get disk space total (in bytes)
$disk_total = disk_total_space($dir);

// calculate the disk space used (in bytes)
$disk_used = $disk_total - $disk_free;

// percentage of disk used
$disk_used_p = sprintf('%.2f',($disk_used / $disk_total) * 100);

// this function will convert bytes value to KB, MB, GB and TB
function convertSize( $bytes )
{
        $sizes = array( 'B', 'KB', 'MB', 'GB', 'TB' );
        for( $i = 0; $bytes >= 1024 && $i < ( count( $sizes ) -1 ); $bytes /= 1024, $i++ );
                return( round( $bytes, 2 ) . " " . $sizes[$i] );
}

// format the disk sizes using the function (B, KB, MB, GB and TB)
$disk_free = convertSize($disk_free);
$disk_used = convertSize($disk_used);
$disk_total = convertSize($disk_total);

echo '<ul>';
echo '<li>Total: '.$disk_total.'</li>';
echo '<li>Used: '.$disk_used.' ('.$disk_used_p.'%)</li>';
echo '<li>Free: '.$disk_free.'</li>';
echo '</ul>';

?>
