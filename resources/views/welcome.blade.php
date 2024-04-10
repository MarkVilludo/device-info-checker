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
        async function reverseInfo(resolutionSize){
            // Split the string by 'x' delimiter
            const [width, height] = resolutionSize.split('x');
            // Return the resolution parts in reversed order
            return `${height}x${width}`;
        }

        async function guessNetworkType() {
            if ('connection' in navigator) {
                const connection = navigator.connection;
                if (connection.effectiveType) {
                    return connection.effectiveType;
                }
            }
            const userAgent = navigator.userAgent;
            if (/LTE/i.test(userAgent)) {
                return "4G/LTE";
            } else if (/3G/i.test(userAgent)) {
                return "3G";
            } else {
                return "Unknown";
            }
        }
       
        async function getInfo() {
            const ip = await fetchIpAddress();
            // in a browser, when using a script tag:
            const ClientJS = window.ClientJS;
            // Create a new ClientJS object
            const client = new ClientJS();
            const availResolution = await reverseInfo(client.getAvailableResolution());
            const landscape = await reverseInfo(client.getCurrentResolution());
            const batteryLevel = (await navigator.getBattery()).level * 100;
            const network = await guessNetworkType();
            const info = [
              
                client.getCustomFingerprint(
                    client.getTimeZone(),
                    client.getLanguage(),
                    client.getFonts(),
                    client.getOS(),
                    client.getEngine(),
                    client.isCookie(),
                    client.isSessionStorage(),
                    client.isCanvas(),
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
                    client.getDeviceType(),
                    client.isWindows(),
                    client.isMac(),
                    client.isLinux(),
                    client.isUbuntu(),
                    ip,
                    client.getAvailableResolution(),
                    client.getCurrentResolution(),
                    batteryLevel,
                    network
                ),
                client.getCustomFingerprint(
                    client.getTimeZone(),
                    client.getLanguage(),
                    client.getFonts(),
                    client.getOS(),
                    client.getEngine(),
                    client.isCookie(),
                    client.isSessionStorage(),
                    client.isCanvas(),
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
                    client.getDeviceType(),
                    client.isWindows(),
                    client.isMac(),
                    client.isLinux(),
                    client.isUbuntu(),
                    ip,
                    availResolution,
                    landscape,
                    batteryLevel,
                    network
                ),
                    client.getBrowserMajorVersion(),
                    client.getTimeZone(),
                    client.getLanguage(),
                    client.getScreenPrint(),
                    client.getFonts(),
                    client.getOS(),
                    client.getEngine(),
                    client.isCookie(),
                    client.isSessionStorage(),
                    client.isCanvas(),
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
                    client.getDeviceType(),
                    client.isWindows(),
                    client.isMac(),
                    client.isLinux(),
                    client.isUbuntu(),
                    ip,
                    client.getAvailableResolution(),
                    client.getCurrentResolution(),
                    availResolution,
                    landscape,
                    batteryLevel,
                    network
            ];
            const distinct = [
                'getCustomFingerprintPortrait',
                'getCustomFingerprintLandscape',
                'getBrowserMajorVersion',
                'getTimeZone',
                'getLanguage',
                'getScreenPrint',
                'getFonts',
                'getOS',
                'getEngine',
                'isCookie',
                'isSessionStorage',
                'isCanvas',
                'isSilverlight',
                'isMobile',
                'isMobileMajor',
                'isMobileAndroid',
                'isMobileOpera',
                'isMobileWindows',
                'isMobileBlackBerry',
                'isMobileIOS',
                'isIphone',
                'isIpad',
                'isIpod',
                'getDeviceType',
                'isWindows',
                'isMac',
                'isLinux',
                'isUbuntu',
                'ip',
                'getAvailableResolution',
                'getCurrentResolution',
                'availResolution',
                'landscape',
                'batteryLevel',
                'network'
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