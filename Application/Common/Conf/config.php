<?php
/**
 * @desc 应用全局公共配置
 */
return array(
    /**
         Zpi      for mobile app, ziplocker + zippora
         Cabinet  for cabinet client, ziplocker + zippora
    */
    'MODULE_ALLOW_LIST'=>array('Cabinet', 'Zpi','Adminuser','Opr'),
    'DEFAULT_MODULE'=> 'Zpi',

    'DEFAULT_TIMEZONE' => 'EST',

    'URL_CASE_INSENSITIVE' => true,
    'URL_MODEL' => 2,
    'READ_DATA_MAP' => true,

    /** pay **/

    'ubi_rate' => 100,

    'pay_channel' => array(
        'account' => 'unibox balance',
        'credit' => 'credit card',
        'ubi' => 'ubi',
        'paypal' => 'paypal',
    ),

    'tax' => array(
        //'default_rate' => 6,
        'default_rate' => 8.25,//update tax rate @20170930
    ),

    'charge_type' => array(
        'recharge' => 'recharge',
        'auto_supplement' => 'auto_supplement',
        'buy' => 'buy',
        'zippora' => 'zippora',
        'ziplocker' => 'ziplocker',
    ),

    'recharge_plus' => true,

    'recharge_amount_config' => array(
        '3' => 0,
        '5' => 1,
        '10' => 2,
        '15' => 4,
        '20' => 6,
        '30' => 9,
    ),

    /* statement config */
    'statement_config' => array(
        'autosupplement' => array (
            'text' => 'AutoSupplement',
            'child' => array(
                'autosupplement' => array(
                    'listText' => 'auto supplement',
                    'detailText' => 'auto supplement wallet with credit card',
                ),
            ),
        ),
        'recharge' => array (
            'text' => 'Recharge',
            'child' => array(
                'recharge' => array(
                    'listText' => 'recharge',
                    'detailText' => 'recharge',
                ),
                'plus' => array(
                    'listText' => 'recharge plus',
                    'detailText' => 'recharge plus',
                ),
            ),
        ),
        'buy' => array(
            'text' => 'buy',
            'child' => array(
                'sold_by_overdue' => array(
                    'listText' => 'timeout to return disk {movieName}',
                    'detailText' => 'timeout to return disk {movieName}',
                ),
            ),
        ),
        'zippora' => array(
            'text' => 'Zippora Charge',
            'child' => array(
                'signup_fee' => array(
                    'listText' => 'signup fee',
                    'detailText' => 'zippora signup fee',
                ),
                'monthly_fee' => array(
                    'listText' => 'month fee',
                    'detailText' => 'zippora month fee',
                ),
                'box_penalty' => array(
                    'listText' => 'store penalty',
                    'detailText' => 'store penalty',
                ),
            ),
        ),
        'ziplocker' => array(
            'text' => 'Ziplocker Charge',
            'child' => array(
                'order_success_fee' => array(
                    'listText' => 'order success fee',
                    'detailText' => 'order success fee',
                ),
                'order_cancel_refund' => array(
                    'listText' => 'cancel order refund',
                    'detailText' => 'cancel order refund',
                ),
                'store_success_penalty' => array(
                    'listText' => 'store timeout penalty',
                    'detailText' => 'store timeout penalty',
                ),
                'token_cancel_penalty' => array(
                    'listText' => 'token cancel penalty',
                    'detailText' => 'token cancel penalty',
                ),
                'fetch_timeout_penalty' => array(
                    'listText' => 'fetch timeout penalty',
                    'detailText' => 'fetch timeout penalty',
                ),
                'deliver_success_penalty' => array(
                    'listText' => 'deliver success penalty',
                    'detailText' => 'deliver success penalty',
                ),
                'pick_success_penalty' => array(
                    'listText' => 'pick success penalty',
                    'detailText' => 'pick success penalty',
                ),
            ),
        ),
    ),

    /** member */
    'member' => array(
        'reg_status_text' => array(
            0 => 'register completed',
            //no status = 1
            2 => 'email has not been verified',
            3 => 'profile has not been completed',
            4 => 'credit card has not been binded',
        ),
        'status_normal' => 0, //正常
        'status_locked' => 1, //封号
    ),

    /** Notice */
    'NOTICE' => array(
	    'NT_ASSET_RETURN'     => 24,//
	    'NT_ASSET_RENT'     => 23,//
	    'NT_ASSET_HAS_PACKAGE_TO_PICK'     => 22,//有包裹需要取件
        'NT_ZIPPORA_HAS_PACKAGE_TO_PICK'     => 21,//有包裹需要取件
        'NT_CREDITCARD_CHARGE_FAIL'     => 10,//信用卡扣费失败
        'NT_ZIPPORA_OVERDUE_NOTICE'   => 31,
        'NT_ZIPPORA_OVERDUE'   => 32,
    ),

    'NOTICE_TMPL' => array(
	   'NT_ASSET_RETURN'     => array(//租产品成功
            'sms' => '[ZipcodeXpress] The product you renturned at ZPXAsset Locker {cabinetId}. ',
            'subject' => 'Renturned Product Notice _ ZipcodeXpress Inc',
            'body' => 'Hi {nickname}:
                <br>
                The product you returned  at ZPXAsset Locker {cabinetId}.
                <br>
                <br>
                Return Address: {address}
                <br> 
                Please pick up asap. 
                <br> 
                Thanks! 
                <br> 
				<br>
				Please be noted that our SMS service is experiencing some changes, we won’t be able to provide regular SMS service in the next few days, please pay attention to your email to receive package notifications. Your email must be correct, if you didn’t register you email using our APP, please verify your email with property management office.
                <br>
				<br>
                We strongly recommend that you download the app to receive notices. Search "ZipcodeXpress" in Apple store or Google play.
                <br>
                <br>
                If you have any questions, please contact us at 1-800-883-9662 or email at Support@ZipcodeXpress.com.
            ',
        ),
	   'NT_ASSET_RENT'     => array(//租产品成功
            'sms' => '[ZipcodeXpress] The product you rented at ZPXAsset Locker {cabinetId}. ',
            'subject' => 'Rented Product Notice _ ZipcodeXpress Inc',
            'body' => 'Hi {nickname}:
                <br>
                The product you rented  at ZPXAsset Locker {cabinetId}.
                <br>
                <br>
                Rented Address: {address}
                <br> 
                Please pick up asap. 
                <br> 
                Thanks! 
                <br> 
				<br>
				Please be noted that our SMS service is experiencing some changes, we won’t be able to provide regular SMS service in the next few days, please pay attention to your email to receive package notifications. Your email must be correct, if you didn’t register you email using our APP, please verify your email with property management office.
                <br>
				<br>
                We strongly recommend that you download the app to receive notices. Search "ZipcodeXpress" in Apple store or Google play.
                <br>
                <br>
                If you have any questions, please contact us at 1-800-883-9662 or email at Support@ZipcodeXpress.com.
            ',
        ),
	   'NT_ASSET_HAS_PACKAGE_TO_PICK'     => array(//有包裹需要取件
            'sms' => '[ZipcodeXpress] The product you reserved at ZPXAsset Locker {cabinetId}. Pickup code: {pickCode}. Please pick up ASAP',
            'subject' => 'Reserved Product Notice _ ZipcodeXpress Inc',
            'body' => 'Hi {nickname}:
                <br>
                The product you reserved  at ZPXAsset Locker {cabinetId}.
                <br>
                <br>
                Pickup Address: {address}
                <br>
                Pickup code: {pickCode}
                <br> 
                <br> 
                Please pick up asap. 
                <br> 
                Thanks! 
                <br> 
				<br>
				Please be noted that our SMS service is experiencing some changes, we won’t be able to provide regular SMS service in the next few days, please pay attention to your email to receive package notifications. Your email must be correct, if you didn’t register you email using our APP, please verify your email with property management office.
                <br>
				<br>
                We strongly recommend that you download the app to receive notices. Search "ZipcodeXpress" in Apple store or Google play.
                <br>
                <br>
                If you have any questions, please contact us at 1-800-883-9662 or email at Support@ZipcodeXpress.com.
            ',
        ),
        'NT_ZIPPORA_HAS_PACKAGE_TO_PICK'     => array(//有包裹需要取件
            'sms' => '[ZipcodeXpress] Your package has arrived at Zippora Smart Locker {cabinetId}. Pickup code: {pickCode}. Please pick up ASAP',
            'subject' => 'Package Delivery Notice _ ZipcodeXpress Inc',
            'body' => 'Hi {nickname}:
                <br>
                Your package has arrived at Zippora Smart Locker {cabinetId}.
                <br>
                <br>
                Pickup Address: {address}
                <br>
                Pickup code: {pickCode}
                <br> 
                <br> 
                Please pick up asap. 
                <br> 
                Thanks! 
                <br> 
				<br>
				Please be noted that our SMS service is experiencing some changes, we won’t be able to provide regular SMS service in the next few days, please pay attention to your email to receive package notifications. Your email must be correct, if you didn’t register you email using our APP, please verify your email with property management office.
                <br>
				<br>
                We strongly recommend that you download the app to receive notices. Search "ZipcodeXpress" in Apple store or Google play.
                <br>
                <br>
                If you have any questions, please contact us at 1-800-883-9662 or email at Support@ZipcodeXpress.com.
            ',
        ),
        'NT_CREDITCARD_CHARGE_FAIL'     => array(//信用卡扣费失败
            'sms' => '[ZipcodeXpress]Your credit card(card number:{cardCode}) has failed to verify gateway at the time of payment,in order not to affect your interest, please update your credit card,thanks.',
            'subject' => 'Credit card verification failed',
            'body' => 'Hello {nickname},
                <br>
                <br>  Your credit card(card number:{cardCode}) has failed to verify gateway at the time of payment,
                <br>  In order not to affect your interest, please update your credit card, thanks.',
        ),
        'NT_ZIPPORA_OVERDUE' => array(
            'sms' => '[ZipcodeXpress]Your package has been removed from Zippora Smart Locker {cabinetId} because of non-pickup. Please contact apartment manager to retrieve your package.',
            'subject' => 'Non-action Notice _ ZipcodeXpress Inc',
            'body' => 'Hi {nickname},
                <br>
                <br>  Your package has been removed from Zippora Smart Locker {cabinetId} because of non-pickup. The pickup code {pickCode} is no longer valid, please contact apartment manager to retrieve your package.
                <br>
                <br> 
                Thanks! 
                <br> 
                <br>
                Please be noted that our SMS service is experiencing some changes, we won’t be able to provide regular SMS service in the next few days, please pay attention to your email to receive package notifications. Your email must be correct, if you didn’t register you email using our APP, please verify your email with property management office.				
                <br>
				<br>
                We strongly recommend that you download the app to receive notices. Search "ZipcodeXpress" in Apple store or Google play.
                <br>
                <br>
                If you have any questions, please contact us at 1-800-883-9662 or email at Support@ZipcodeXpress.com.
            ',
        ),
        'NT_ZIPPORA_OVERDUE_NOTICE'     => array(
            'sms' => '[ZipcodeXpress]Your package has been in the Zippora Smart Locker {cabinetId} more than 3 days, please pick it up ASAP to avoid overdue fee. Pickup Code: {pickCode}',
            'subject' => 'Package Overdue Reminder _ ZipcodeXpress Inc',
            'body' => 'Hi {nickname}:
                <br> 
                Your package has been in the Zippora Smart Locker {cabinetId} more than 3 days, please pick up it as soon as possible. Otherwise, you will be charged an overdue fee.
                <br> 
                <br>
                Pickup address: {address}
                <br> 
                Pickup code: {pickCode}
                <br> 
                <br> 
                Please pick up asap. 
                <br> 
                Thanks! 
                <br> 
                <br>
				Please be noted that our SMS service is experiencing some changes, we won’t be able to provide regular SMS service in the next few days, please pay attention to your email to receive package notifications. Your email must be correct, if you didn’t register you email using our APP, please verify your email with property management office.
				<br> 
                <br>
                We strongly recommend that you download the app to receive notices and make it easier to pick up your package(s). Search "ZipcodeXpress" in Apple store or Google play.
                <br>
                <br>
                If you have any questions, please contact us at 1-800-883-9662 or email at Support@ZipcodeXpress.com.
            ',
        ),
    ),

    /** o_ zippora **/
    'o_apartment_price' => 3,//$3

    /** z_ cabinet **/
    'z_box_status' => [
        'available' => 0,
        'occupied' => 1,
    ],

    'z_price_config' => [
        'cargo_weight' => .02,
        'cargo_worth' => .01,

        'dist_price_rate' => .1,

        'order_success' => [
            'type' => 'fee',
            'conf' => [
                [
                    'charge_rate' => 1,
                ]
            ],
        ],

        'order_cancel' => [
            'type' => 'refund',
            'conf' => [
                [
                    'charge_rate' => .8,
                    'charge_end' => 2,
                ],
                [
                    'charge_rate' => .5,
                    'charge_begin' => 2,
                    'charge_end' => 24,
                ],
                [
                    'charge_rate' => .2,
                    'charge_begin' => 24,
                    'charge_end' => 48,
                ],
            ],
        ],

        'store_success' => [
            'type' => 'penalty',
            'conf' => [
                [
                    'charge_rate' => 2,
                    'charge_begin' => 24,
                    'charge_end' => 48,
                ],
            ],
        ],

        'token_cancel' => [
            'type' => 'penalty',
            'conf' => [
                [
                    'charge_rate' => 1,
                    'charge_end' => .5,
                    'charge_base' => 1,
                ],
                [
                    'charge_rate' => .2,
                    'charge_begin' => .5,
                    'charge_end' => 2,
                ],
                [
                    'charge_rate' => .5,
                    'charge_begin' => 2,
                    'charge_end' => 4,
                ],
                [
                    'charge_rate' => .8,
                    'charge_begin' => 4,
                    'charge_end' => 8,
                ],
                [
                    'charge_rate' => 1,
                    'charge_begin' => 8,
                ],
            ],
        ],

        'fetch_timeout' => [
            'type' => 'penalty',
            'conf' => [
                [
                    'charge_rate' => 1,
                ],
            ],
        ],

        'deliver_success' => [
            'type' => 'penalty',
            'conf' => [
                [
                    'charge_rate' => 1,
                    'charge_each' => 1,
                    'charge_base' => 1,
                ],
            ],
        ],

        'pick_success' => [
            'type' => 'penalty',
            'conf' => [
                [
                    'charge_rate' => 1,
                    'charge_each' => 24,
                ],
            ],
        ],
    ],

    'z_deliver_status_text' => [

        '0'   => 'unknown status',

        //order

        '7'   => 'timeout to pay',
        '8'   => 'wait for payment',
        '9'   => 'fail to pay',

        '10'  => 'order success',
        '11'  => 'member cancel',

        '27'  => 'timeout to store',

        //store
        '29'  => 'fail to store',
        '30'  => 'store success',

        '47'  => 'timeout to token',//not used

        //token
        '50'  => 'order has been token',
            '51'  => 'courier cancel',
            '67'  => 'timeout to fetch',

        //fetch
        '69'  => 'fail to fetch',
        '70'  => 'fetch success',
        '71'  => 'fetch complain',
        '79'  => 'lost',

        '87'  => 'timeout to deliver',

        //deliver
        '89'  => 'fail to deliver',
        '90'  => 'deliver success',

        '97'  => 'timeout to pick',

        //pick
        '99' => 'fail to pick',
        '100' => 'pick success',
        '101' => 'pick complain',
    ],

    'z_deliver_status_code' => [

        'unknown_status'       => '0',

        //order commit/cancel
        'pay_timeout'          => '7',
        'pay_wait'             => '8',
        'pay_fail'             => '9',

        'order_success'        => '10',
        'order_cancel'         => '11',
        'order_timeout'        => '19',

        'store_timeout'        => '27',

        //package arrived origin box
        'store_fail'           => '29',
        'store_success'        => '30',

        'token_timeout'        => '47',

        //courier take order
        'token_success'        => '50',
                    'token_cancel'       => '51',//for courier_order.status only
                    'fetch_timeout'      => '67',//for courier_order.status only

        //courier fetch package
        'fetch_fail'           => '69',//for courier_order.status only
        'fetch_success'        => '70',
        'fetch_complain'       => '71',
        'fetch_lost'           => '79',

        'deliver_timeout'      => '87',

        //package arrived dest box
        'deliver_fail'         => '89',
        'deliver_success'      => '90',

        'pick_timeout'         => '97',

        //receiver pick package
        'pick_fail'            => '99',
        'pick_success'         => '100',
        'pick_complain'        => '101',
    ],

    'z_cargo_status_text' => [
        '1' => 'Pending',
        '2' => 'Origin Box',
        '3' => 'In transit',
        '4' => 'Destination',
        '5' => 'Received',
    ],

    'z_cargo_status' => [
       'pending'  => '1',
       'origin_box'  => '2',
       'in_transit'  => '3',
       'destination'  => '4',
       'received'  => '5',
    ],

    'z_courier_bonus_rate' => .6,

    'error_notice_email_list' => [
        'service@gounibox.com',
        'xiaoqing@unibox.com.cn',
        'yangyuan@unibox.com.cn',
        'liuyuan@unibox.com.cn',
    ],
);