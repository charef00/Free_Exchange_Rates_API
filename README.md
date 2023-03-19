# Free Exchange Rates API

This is a simple PHP API for getting exchange rates between different currencies. You can use this API to get the exchange rate between two currencies, or to get a list of all available currencies.

## Usage

To use this API, follow the steps below:

### Step 1: Clone the project

Clone the `Free_Exchange_Rates_API` repository to your local machine:

Run `git clone https://github.com/charef00/Free_Exchange_Rates_API.git`


### Step 2: Start your local server

Start your local server (e.g., XAMPP, WAMP, or MAMP) and copy the `Free_Exchange_Rates_API` folder to the `htdocs` directory of your server.

### Step 3: Get all available currency codes

To get all available currency codes, visit the following URL:

http://localhost/Free_Exchange_Rates_API/


This will return a JSON object containing all available currency codes.
```json
{"currencies":[{"code":"AED"},{"code":"AFN"},{"code":"XRP"},{"code":"YER"},{"code":"ZAR"},{"code":"ZMW"},{"code":"ZWL"}]}
```
### Step 4: Convert currency

To convert currency, use the following URL format:

http://localhost/Free_Exchange_Rates_API/convert.php?f=FROM_CURRENCY&t=TO_CURRENCY



Replace `FROM_CURRENCY` with the three-letter currency code for the currency you want to convert from (e.g., "MAD" for Moroccan Dirham) and `TO_CURRENCY` with the three-letter currency code for the currency you want to convert to (e.g., "USD" for US Dollar).

This will return a JSON object containing the exchange rate and the converted amount.

### Remark for mobile developers

If you want to use the API in a mobile app, you can't use `localhost` or `127.0.0.1` as the server address. Instead, use `10.0.2.2` as the server address in your mobile app's code. This will route requests to your local server on your development machine.


## Troubleshooting

### Volley error when using the API in localhost

If you are using the API in localhost on a mobile device and encounter problems with Volley, such as "com.android.volley.NoConnectionError: java.io.IOException: Cleartext HTTP traffic to domain not permitted" you may need to create a file called "network_security_config.xml" in the "res/xml" directory of your Android project. Add the following code to this file:
```xml
<?xml version="1.0" encoding="utf-8"?>
<network-security-config>
    <base-config cleartextTrafficPermitted="true">
        <trust-anchors>
            <certificates src="system" />
        </trust-anchors>
    </base-config>
</network-security-config>
```

Next, in the "AndroidManifest.xml" file, add the following property to your application tag: android:networkSecurityConfig="@xml/network_security_config". This will allow the application to make network requests to the local server without encountering any security issues.



## License

This project is licensed under the MIT License. See the `LICENSE` file for details.


Feel free to customize it as needed for your project.
