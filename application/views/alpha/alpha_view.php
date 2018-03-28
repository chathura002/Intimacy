<!DOCTYPE html>
<html lang="en" class="fullscreen-bg">
    <head>
        <title>Alphabetical Categorization</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Main CSS -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/test_stylesheet.css'); ?>">
    </head>
    <body>
        <header><a href="http://www.blackpepper.co.nz/"><img src="http://www.blackpepper.co.nz/images/logo1.png"></a></header>
        <?php
        //Rearrange array data
        $i = 0;
        foreach ($client_data as $single_client) {
            $rearranged_arr[$single_client->bp_name]['url'] = $single_client->bp_url;
            $rearranged_arr[$single_client->bp_name]['image'] = $single_client->bp_image;
            $rearranged_arr[$single_client->bp_name]['name'] = $single_client->bp_name;
            $i++;
        }
        //Sort array into alphabetical order
        ksort($rearranged_arr);
        //Categorize sorted array according to the first letter of the client name
        foreach ($rearranged_arr as $client_name => $other_data) {
            $result[substr($client_name, 0, 1)][] = $other_data;
        }
        //All alphabetic chars
        $az_range = range('A', 'Z');
        ?>
        <!-- Start showing result -->
        <main>
            <?php
            for ($x = 0; $x < count($az_range); $x+=2) {
                //get each two letters from az_range array
                $two_letter_range = array_slice($az_range, $x, 2);
                //Check that letters are exist in the key of result array
                if (array_key_exists($two_letter_range[0], $result) || array_key_exists($two_letter_range[1], $result)) {
                    ?>
                    <!-- if the key is exist loop client data -->
                    <div class="set">
                        <div class="pad">
                            <!-- letter range -->
                            <h2><?php echo $two_letter_range[0] . ' - ' . $two_letter_range[1] ?></h2>
                            <?php if (isset($result[$two_letter_range[0]])) { ?>
                                <?php foreach ($result[$two_letter_range[0]] as $single_result) { ?>
                                    <a href="<?php echo $single_result['url'] ?>" title="<?php echo $single_result['name'] ?>" target="_blank"><img src="<?php echo $single_result['image'] ?>" alt="<?php $single_result['name'] ?>"></a>
                                <?php } ?>
                            <?php } ?>
                            <?php if (isset($result[$two_letter_range[1]])) { ?>
                                <?php foreach ($result[$two_letter_range[1]] as $single_result) { ?>
                                    <a href="<?php echo $single_result['url'] ?>" title="<?php echo $single_result['name'] ?>" target="_blank"><img src="<?php echo $single_result['image'] ?>" alt="<?php $single_result['name'] ?>"></a>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </main>
        <!-- end showing result -->
    </body>
</html>