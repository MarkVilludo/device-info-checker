<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plugin Information</title>
    <script src="{{ asset('js/clientjs.min.js') }}"></script>
</head>
<body>
    <h1>Device Information</h1>
    <div id="result"></div>

    <script>
        async function fetchIpAddress() {
            try {
                const response = await fetch('https://api.ipify.org?format=json');
                const data = await response.json();
                return data.ip;
            } catch (error) {
                console.error('Error fetching IP address:', error);
                return null;
            }
        }
        async function getInfo() {
            const ip = await fetchIpAddress();
            // in a browser, when using a script tag:
            const ClientJS = window.ClientJS;
            // Create a new ClientJS object
            const client = new ClientJS();
            const info = [
                // client.getBrowserData(),
                // client.getFingerprint(),
                client.getCustomFingerprint(
                    // client.getBrowserMajorVersion(),
                    client.getTimeZone(),
                    client.getLanguage(),
                    // client.getScreenPrint(),
                    client.getFonts(),
                    client.getOS(),
                    client.getBrowserData(),
                    client.getEngine(),
                    client.isCookie(),
                    client.isSessionStorage(),
                    // client.isCanvas(),
                    client.isSilverlight(),
                    client.isMobile(),
                    client.isMobileMajor(),
                    client.isMobileAndroid(),
                    client.isMobileOpera(),
                    client.isMobileWindows(),
                    client.isMobileBlackBerry(),
                    client.isMobileIOS(),
                    client.isIphone(),
                    client.isIpad(),
                    client.isIpod(),
                    client.getDevice(),
                    client.getDeviceType(),
                    client.getDeviceVendor(),
                    client.isWindows(),
                    client.isMac(),
                    client.isLinux(),
                    client.isUbuntu(),
                    ip
                ),
                [
                    // client.getBrowserMajorVersion(),
                    "getTimeZone: "+ client.getTimeZone(),
                    "getLanguage: "+client.getLanguage(),
                    // "getTimeZone: "+client.getScreenPrint(),
                    "getFonts: "+client.getFonts(),
                    "getOS: "+client.getOS(),
                    "getBrowserData: "+client.getBrowserData(),
                    "getEngine: "+client.getEngine(),
                    "isCookie: "+client.isCookie(),
                    "isSessionStorage: "+client.isSessionStorage(),
                    // "isCanvas: "+client.isCanvas(),
                    "isSilverlight: "+client.isSilverlight(),
                    "isMobile: "+client.isMobile(),
                    "isMobileMajor: "+client.isMobileMajor(),
                    "isMobileAndroid: "+client.isMobileAndroid(),
                    "isMobileOpera: "+client.isMobileOpera(),
                    "isMobileWindows: "+client.isMobileWindows(),
                    "isMobileBlackBerry: "+client.isMobileBlackBerry(),
                    "isMobileIOS: "+client.isMobileIOS(),
                    "isIphone: "+client.isIphone(),
                    "isIpad: "+client.isIpad(),
                    "isIpod: "+client.isIpod(),
                    "getDevice: "+client.getDevice(),
                    "getDeviceType: "+client.getDeviceType(),
                    "getDeviceVendor: "+client.getDeviceVendor(),
                    "isWindows: "+client.isWindows(),
                    "isMac: "+client.isMac(),
                    "isLinux: "+client.isLinux(),
                    "isUbuntu: "+client.isUbuntu(),
                    "IP address: "+ ip
                ]
            ];
            const distinct = [
                // 'getBrowserData',
                // 'getFingerprint',
                'getCustomFingerprint',
                'data_from_custom',
                'ipAddress'
            ];
            const fingerprintWithName = Object.fromEntries(distinct.map((key, index) => [key, info[index]]));
            const resultDiv = document.getElementById('result');
            resultDiv.innerHTML = '<pre>' + JSON.stringify(fingerprintWithName, null, 2) + '</pre>';
            console.log(fingerprintWithName);
        }
        // Call the function to get the info
        getInfo();
    </script>
</body>

</html>
