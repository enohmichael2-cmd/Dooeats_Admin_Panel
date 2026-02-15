<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class SettingsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function social()
    {
        return view("settings.app.social");
    }

    public function globals()
    {
        return view("settings.app.global");
    }

    public function zohoFlow()
    {
        return view("settings.app.zohoFlow");
    }

    public function testZohoWebhook(Request $request) {
        $zoho_url = $request->zoho_url;
        if (!$zoho_url) {
            return response()->json(['success' => false, 'message' => 'Zoho URL is required']);
        }

        try {
            $client = new Client();
            $test_payload = [
                'id' => 'TEST_ORDER_123',
                'authorID' => 'TEST_USER_001',
                'vendorID' => 'TEST_VENDOR_999',
                'status' => 'Test Order',
                'products' => [
                    [
                        'name' => 'Test Burger',
                        'price' => 15.00,
                        'quantity' => 1
                    ]
                ],
                'payment_method' => 'Test Payment',
                'total' => 15.00,
                'createdAt' => date('Y-m-d H:i:s'),
                'is_test_data' => true
            ];

            $response = $client->post($zoho_url, [
                'json' => $test_payload
            ]);

            return response()->json(['success' => true, 'message' => 'Test webhook sent successfully! Status: ' . $response->getStatusCode()]);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function notifications()
    {
        return view("settings.app.notification");
    }





    public function mobileGlobals()
    {
        return view('settings.mobile.globals');
    }



    public function adminCommission()
    {
        return view("settings.app.adminCommission");
    }

    public function radiosConfiguration()
    {
        return view("settings.app.radiosConfiguration");
    }



    public function bookTable()
    {
        return view('settings.app.bookTable');
    }


    public function paystack()
    {
        return view('settings.app.paystack');
    }





    public function deliveryCharge()
    {
        return view("settings.app.deliveryCharge");
    }

    public function languages()
    {
        return view('settings.languages.index');
    }

    public function languagesedit($id)
    {
        return view('settings.languages.edit')->with('id', $id);
    }

    public function languagescreate()
    {
        return view('settings.languages.create');
    }

    public function specialOffer()
    {
        return view('settings.app.specialDiscountOffer');
    }

    public function menuItems()
    {
        return view('settings.menu_items.index');
        
    }

    public function menuItemsCreate()
    {
        return view('settings.menu_items.create');

    }

    public function menuItemsEdit($id)
    {
        return view('settings.menu_items.edit')->with('id', $id);

    }

    public function story()
    {
        return view('settings.app.story');

    }

    public function footerTemplate()
    {
        return view('footerTemplate.index');
    }

    public function homepageTemplate()
    {
        return view('homepage_Template.index');
    }

    public function emailTemplatesIndex()
    {
        return view('email_templates.index');        
    }

    public function emailTemplatesSave($id = '')
    {

        return view('email_templates.save')->with('id', $id);
    }
    public function documentVerification()
    {
        return view('settings.app.documentVerificationSetting');
    }
    public function scheduleOrderNotification()
    {
        return view('settings.app.schedule_notification');
    }
}