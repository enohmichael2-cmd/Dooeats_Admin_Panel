<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      <?php if (str_replace('_', '-', app()->getLocale()) == 'ar' || @$_COOKIE['is_rtl'] == 'true') { ?> dir="rtl" <?php } ?>>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
<!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
    <title id="app_name">Admin Panel</title>
    <link rel="icon" id="favicon" type="image/x-icon"
          href="<?php echo str_replace('images/', 'images%2F', @$_COOKIE['favicon']); ?>">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <?php if (str_replace('_', '-', app()->getLocale()) == 'ar' || @$_COOKIE['is_rtl'] == 'true') { ?>
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap-rtl.min.css')}}" rel="stylesheet">
    <?php } ?>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/modern-admin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin-premium.css') }}" rel="stylesheet">
    <?php if (str_replace('_', '-', app()->getLocale()) == 'ar' || @$_COOKIE['is_rtl'] == 'true') { ?>
    <link href="{{asset('css/style_rtl.css')}}" rel="stylesheet">
    <?php } ?>
    <link href="{{ asset('css/icons/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    <link href="{{ asset('css/colors/blue.css') }}" rel="stylesheet">
    <link href="{{ asset('css/chosen.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-tagsinput.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet">

    <link href="{{ asset('assets/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-draw/dist/leaflet.draw.css" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
    
    <style type="text/css">
        :root {
            --primary-color: <?php echo $_COOKIE['admin_panel_color'] ?? '#6366f1'; ?>;
            --primary-rgb: <?php 
                $hex = $_COOKIE['admin_panel_color'] ?? '#6366f1';
                list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                echo "$r, $g, $b";
            ?>;
        }

        /* 
         * Theme Overrides 
         */
        .btn-primary, .btn-primary:hover, .btn-primary:active, .btn-primary:focus {
            background-color: var(--primary-color) !important;
            border-color: var(--primary-color) !important;
        }
        .bg-info, .bg-primary { background-color: var(--primary-color) !important; }
        .text-info, .text-primary { color: var(--primary-color) !important; }

        /* Premium DataTables Glassmorphism */
        .dataTables_wrapper {
            padding: 20px;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.07);
        }

        table.dataTable {
            border-collapse: separate !important;
            border-spacing: 0 8px !important;
            background: transparent !important;
        }

        table.dataTable thead th {
            background: rgba(var(--primary-rgb), 0.05) !important;
            color: var(--primary-color) !important;
            font-weight: 700 !important;
            text-transform: uppercase;
            font-size: 11px;
            letter-spacing: 1px;
            padding: 12px 15px !important;
            border: none !important;
            border-bottom: 2px solid rgba(var(--primary-rgb), 0.2) !important;
        }

        table.dataTable tbody tr {
            background: rgba(255, 255, 255, 0.7) !important;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0,0,0,0.02);
        }

        table.dataTable tbody tr td {
            padding: 15px !important;
            border: none !important;
            vertical-align: middle !important;
        }

        table.dataTable tbody tr:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(var(--primary-rgb), 0.1);
            background: #fff !important;
        }

        .dataTables_filter input {
            background: rgba(255, 255, 255, 0.9) !important;
            border: 1px solid rgba(var(--primary-rgb), 0.2) !important;
            border-radius: 8px !important;
            padding: 6px 12px !important;
            outline: none !important;
            transition: all 0.3s ease;
        }

        .dataTables_filter input:focus {
            border-color: var(--primary-color) !important;
            box-shadow: 0 0 0 3px rgba(var(--primary-rgb), 0.1) !important;
        }

        .dataTables_paginate .paginate_button.current {
            background: var(--primary-color) !important;
            color: white !important;
            border: none !important;
            border-radius: 6px !important;
        }

        .dataTables_paginate .paginate_button:hover {
            background: rgba(var(--primary-rgb), 0.1) !important;
            color: var(--primary-color) !important;
            border: none !important;
        }
    </style>
</head>
    <body>

<div id="app" class="fix-header fix-sidebar card-no-border">
    <div id="main-wrapper">
        <div id="data-table_processing" class="page-overlay" style="display:none; background: rgba(255,255,255,0.1); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); position: fixed; width: 100%; height: 100%; z-index: 9999; top: 0; left: 0; align-items: center; justify-content: center;">
            <div class="overlay-content" style="text-align: center;">
                <div class="glass-loader">
                    <img src="{{asset('images/spinner.gif')}}" style="width: 80px; height: 80px; filter: drop-shadow(0 0 10px rgba(var(--primary-rgb), 0.3));">
                    <p style="margin-top: 15px; color: var(--primary-color); font-weight: 600; font-family: 'Inter', sans-serif; letter-spacing: 0.5px;">{{ trans('lang.please_wait') }}</p>
                </div>
            </div>
        </div>
        <style>
            .page-overlay[style*="display: flex"] { display: flex !important; }
        </style>
        <header class="topbar">

            <nav class="navbar top-navbar navbar-expand-md navbar-light glass-nav">
                @include('layouts.header')
            </nav>

        </header>
        <aside class="left-sidebar">
            <div class="scroll-sidebar">
                @include('layouts.menu')
            </div>
        </aside>
        <div class="page-wrapper" style="min-height: 100vh; background: transparent;">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
<script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('js/waves.js') }}"></script>
<script src="{{ asset('js/sidebarmenu.js') }}"></script>
<script src="{{ asset('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
<script src="{{ asset('assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{ asset('js/custom.min.js') }}"></script>
<script src="{{ asset('assets/plugins/summernote/summernote-bs4.js')}}"></script>

<script src="{{ asset('js/jquery.resizeImg.js') }}"></script>
<script src="{{ asset('js/mobileBUGFix.mini.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://unpkg.com/tippy.js@6"></script>

<script type="text/javascript">
    jQuery(window).scroll(function () {
        var scroll = jQuery(window).scrollTop();
        if (scroll <= 60) {
            jQuery("body").removeClass("sticky");
        } else {
            jQuery("body").addClass("sticky");
        }
    });
    


</script>
<script src="{{ asset('assets/plugins/select2/dist/js/select2.min.js') }}"></script>
<script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-storage.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-database.js"></script>
<script src="{{ asset('js/geofirestore.js') }}"></script>
<script src="https://cdn.firebase.com/libs/geofire/5.0.1/geofire.min.js"></script>
<script src="{{ asset('js/chosen.jquery.js') }}"></script>
<script src="{{ asset('js/bootstrap-tagsinput.js') }}"></script>
<script src="{{ asset('js/crypto-js.js') }}"></script>
<script src="{{ asset('js/jquery.cookie.js') }}"></script>
<script src="{{ asset('js/jquery.validate.js') }}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script type="text/javascript"
        src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.24/jspdf.plugin.autotable.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script src="{{ asset('js/jquery.masking.js') }}"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script type="text/javascript">
    var firebaseConfig = {
        apiKey: "{{ config('firebase.api_key') }}",
        authDomain: "{{ config('firebase.auth_domain') }}",
        databaseURL: "{{ config('firebase.database_url') }}",
        projectId: "{{ config('firebase.project_id') }}",
        storageBucket: "{{ str_replace('gs://', '', config('firebase.storage_bucket')) }}",
        messagingSenderId: "{{ config('firebase.messaging_sender_id') }}",
        appId: "{{ config('firebase.app_id') }}",
        measurementId: "{{ config('firebase.measurement_id') }}"
    };

    // Initialize Firebase only if not already initialized
    if (!firebase.apps.length) {
        try {
            firebase.initializeApp(firebaseConfig);
        } catch (error) {
            console.error("Firebase initialization failed:", error);
            // Optionally re-throw if critical
            // throw error;
        }
    }

    firebase.auth().onAuthStateChanged(function(user) {
        if (!user) {
            firebase.auth().signInAnonymously().catch(function(error) {
                console.error("Auth Error", error);
            });
        }
    });
    
    var database = firebase.firestore();
    var geoFirestore = new GeoFirestore(database);
    var createdAtman = firebase.firestore.Timestamp.fromDate(new Date());
    var createdAt = {_nanoseconds: createdAtman.nanoseconds, _seconds: createdAtman.seconds};

    var ref = database.collection('settings').doc("globalSettings");
    ref.get().then(async function (snapshots) {
        try {
            var globalSettings = snapshots.data();
            $("#logo_web").attr('src', globalSettings.appLogo);

/*            if (getCookie('meta_title') == undefined || getCookie('meta_title') == null || getCookie('meta_title') == "") {
                document.title = globalSettings.meta_title;

                setCookie('meta_title', globalSettings.meta_title, 365);
            }*/

        } catch (error) {

        }
    });
    var refDistance = database.collection('settings').doc("RestaurantNearBy");
    refDistance.get().then(async function (snapshots) {
        try {
            var data = snapshots.data();
            var distanceType=data.distanceType.charAt(0).toUpperCase() + data.distanceType.slice(1);
            $('#distanceType').val(distanceType);
            $('.global_distance_type').html(distanceType);

        } catch (error) {

        }
    });


    var langcount = 0;
    var languages_list = database.collection('settings').doc('languages');
    languages_list.get().then(async function (snapshotslang) {
        snapshotslang = snapshotslang.data();
        if (snapshotslang != undefined) {
            snapshotslang = snapshotslang.list;
            languages_list_main = snapshotslang;
            snapshotslang.forEach((data) => {
                if (data.isActive == true) {
                    langcount++;
                    $('#language_dropdown').append($("<option></option>").attr("value", data.slug).text(data.title));
                }
            });
            if (langcount > 1) {
                $("#language_dropdown_box").css('visibility', 'visible');
            }
            <?php if (session()->get('locale')) { ?>
            $("#language_dropdown").val("<?php    echo session()->get('locale'); ?>");
            <?php } ?>

        }
    });

    var url = "{{ route('changeLang') }}";

    $(".changeLang").change(function () {
        var slug = $(this).val();
        languages_list_main.forEach((data) => {
            if (slug == data.slug) {
                if (data.is_rtl == undefined) {
                    setCookie('is_rtl', 'false', 365);
                } else {
                    setCookie('is_rtl', data.is_rtl.toString(), 365);
                }
                window.location.href = url + "?lang=" + slug;
            }
        });
    });

    function setCookie(cname, cvalue, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        let expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }

    var version = database.collection('settings').doc("Version");
    version.get().then(async function (snapshots) {
        var version_data = snapshots.data();
        if (version_data == undefined) {
            database.collection('settings').doc('Version').set({});
        }
        try {
            $('.web_version').html("V:" + version_data.web_version);
        } catch (error) {
        }
    });

    async function sendEmail(url, subject, message, recipients) {

        var checkFlag = false;

        await $.ajax({

            type: 'POST',
            data: {
                subject: subject,
                message: message,
                recipients: recipients
            },
            url: url,
            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                checkFlag = true;
            },
            error: function (xhr, status, error) {
                checkFlag = true;
            }
        });

        return checkFlag;

    }
    function exportData(dt, format, config) {
        const {
            columns,              
            fileName = 'Export',    
        } = config;

        const filteredRecords = dt.ajax.json().filteredData;

        const fieldTypes = {};
        const dataMapper = (record) => {
            return columns.map((col) => {
                const value = record[col.key];
                if (!fieldTypes[col.key]) {
                    if (value === true || value === false) {
                        fieldTypes[col.key] = 'boolean';
                    } else if (value && typeof value === 'object' && value.seconds) {
                        fieldTypes[col.key] = 'date'; 
                    } else if (typeof value === 'number') {
                        fieldTypes[col.key] = 'number';
                    } else if (typeof value === 'string') {
                        fieldTypes[col.key] = 'string';
                    } else {
                        fieldTypes[col.key] = 'string'; 
                    }
                }

                switch (fieldTypes[col.key]) {
                    case 'boolean':
                        return value ? 'Yes' : 'No'; 
                    case 'date':
                        return value ? new Date(value.seconds * 1000).toLocaleString() : '-';
                    case 'number':
                        return typeof value === 'number' ? value : 0;
                    case 'string':
                    default:
                        return value || '-';
                }
            });
        };

        const tableData = filteredRecords.map(dataMapper);

        const data = [columns.map(col => col.header), ...tableData];

        const columnWidths = columns.map((_, colIndex) =>
            Math.max(...data.map(row => row[colIndex]?.toString().length || 0))
        );

        if (format === 'csv') {
            const csv = data.map(row => row.map(cell => {
                if (typeof cell === 'string' && (cell.includes(',') || cell.includes('\n') || cell.includes('"'))) {
                    return `"${cell.replace(/"/g, '""')}"`;
                }
                return cell;
            }).join(',')).join('\n');

            const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
            saveAs(blob, `${fileName}.csv`);
        } else if (format === 'excel') {
            const ws = XLSX.utils.aoa_to_sheet(data, { cellDates: true });

            ws['!cols'] = columnWidths.map(width => ({ wch: Math.min(width + 5, 30) })); 

            const wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, 'Data');
            XLSX.writeFile(wb, `${fileName}.xlsx`);
        } else if (format === 'pdf') {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            const totalLength = columnWidths.reduce((sum, length) => sum + length, 0);
            const columnStyles = {};
            columnWidths.forEach((length, index) => {
                columnStyles[index] = {
                    cellWidth: (length / totalLength) * 180, 
                };
            });

            doc.setFontSize(16);
            doc.text(fileName, 14, 16);

            doc.autoTable({
                head: [columns.map(col => col.header)],
                body: tableData,
                startY: 20,
                theme: 'striped',
                styles: {
                    cellPadding: 2,
                    fontSize: 10,
                },
                columnStyles,
                margin: { top: 30, bottom: 30 },
                didDrawPage: function (data) {
                    doc.setFontSize(10);
                    doc.text(fileName, data.settings.margin.left, 10);
                }
            });
            doc.save(`${fileName}.pdf`);
        } else {
            console.error('Unsupported format');
        }
    }


    var mapType = 'ONLINE';
    database.collection('settings').doc('DriverNearBy').get().then(async function (snapshots) {
        var data = snapshots.data();
        if (data && data.selectedMapType && data.selectedMapType == "osm") {
            mapType = "OFFLINE"
        }
    });

    async function loadGoogleMapsScript() {
        var googleMapKeySnapshotsHeader = await database.collection('settings').doc("googleMapKey").get();
        var placeholderImageHeaderData = googleMapKeySnapshotsHeader.data();
        googleMapKey = placeholderImageHeaderData.key;

        function onAllScriptsLoaded() {
            navigator.geolocation.getCurrentPosition(GeolocationSuccessCallback, GeolocationErrorCallback);
            if (typeof window['InitializeGodsEyeMap'] === 'function') {
                InitializeGodsEyeMap();
            }
        }

        if (mapType == "OFFLINE") {
            var leafletScripts = [
                "https://unpkg.com/leaflet@1.7.1/dist/leaflet.js",
                "https://unpkg.com/leaflet-draw/dist/leaflet.draw.js",
                "https://cdnjs.cloudflare.com/ajax/libs/leaflet-editable/0.7.3/leaflet.editable.min.js",
                "https://unpkg.com/leaflet-draw@0.4.14/dist/leaflet.draw-src.js",
                "https://unpkg.com/leaflet-ajax/dist/leaflet.ajax.min.js",
                "https://unpkg.com/leaflet-geojson-layer/src/leaflet.geojson.js",
                "https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"
            ];
            function loadNextScript(index) {
                if (index >= leafletScripts.length) {
                    onAllScriptsLoaded();
                    return;
                }
                var s = document.createElement('script');
                s.src = leafletScripts[index];
                s.onload = function () { loadNextScript(index + 1); };
                s.onerror = function () { console.error('Failed to load: ' + leafletScripts[index]); loadNextScript(index + 1); };
                document.head.appendChild(s);
            }
            loadNextScript(0);
        } else {
            var script = document.createElement('script');
            script.src = "https://maps.googleapis.com/maps/api/js?key=" + googleMapKey + "&libraries=places,drawing";
            script.async = true;
            script.onload = onAllScriptsLoaded;
            document.head.appendChild(script);
        }
    }

    const GeolocationSuccessCallback = (position) => {
        if(position.coords != undefined){
            default_latitude = position.coords.latitude
            default_longitude = position.coords.longitude
            setCookie('default_latitude', default_latitude, 365);
            setCookie('default_longitude', default_longitude, 365);
        }
    };

    const GeolocationErrorCallback = (error) => {
        console.log('Error: You denied for your default Geolocation',error.message);
        setCookie('default_latitude', '23.022505', 365);
        setCookie('default_longitude','72.571365', 365);
    };

    loadGoogleMapsScript();

    async function sendNotification(fcmToken = '', title, body) {
        var checkFlag = false;
        var sendNotificationUrl = "{{ route('send-notification') }}";

        if (fcmToken !== '') {
            await $.ajax({
                type: 'POST',
                url: sendNotificationUrl,
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    'fcm': fcmToken,
                    'title': title,
                    'message': body
                },
                success: function (data) {
                    checkFlag = true;
                },
                error: function (error) {
                    checkFlag = true;
                }
            });
        } else {
            checkFlag = true;
        }

        return checkFlag;
    }

    database.collection('settings').doc("notification_setting").get().then(async function (snapshots) {
        var data = snapshots.data();
        if(data != undefined){
            serviceJson = data.serviceJson;
            if(serviceJson != '' && serviceJson != null){
                $.ajax({
                    type: 'POST',
                    data: {
                        serviceJson: btoa(serviceJson),
                    },
                    url: "{{ route('store-firebase-service') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                    }
                });
            }
        }
    });

         //On delete item delete image also from bucket general code
         const deleteDocumentWithImage = async (collection, id, singleImageField, arrayImageField) => {
            // Reference to the Firestore document
            const docRef = database.collection(collection).doc(id);
            try {
                const doc = await docRef.get();
                if (!doc.exists) {
                    console.log("No document found for deletion");
                    return;
                }

                const data = doc.data();

                // Deleting single image field
                if (singleImageField) {
                    if (Array.isArray(singleImageField)) {
                        for (const field of singleImageField) {
                            const imageUrl = data[field];
                            if (imageUrl) await deleteImageFromBucket(imageUrl);
                        }
                    } else {
                        const imageUrl = data[singleImageField];
                        if (imageUrl) await deleteImageFromBucket(imageUrl);
                    }
                }
                // Deleting array image field
                if (arrayImageField) {
                    if (Array.isArray(arrayImageField)) {
                        for (const field of arrayImageField) {
                            const arrayImages = data[field];
                            if (arrayImages && Array.isArray(arrayImages)) {
                                for (const imageUrl of arrayImages) {
                                    if (imageUrl) await deleteImageFromBucket(imageUrl);
                                }
                            }
                        }
                    } else {
                        const arrayImages = data[arrayImageField];
                        if (arrayImages && Array.isArray(arrayImages)) {
                            for (const imageUrl of arrayImages) {
                                if (imageUrl) await deleteImageFromBucket(imageUrl);
                            }
                        }
                    }
                }

                 // Deleting images in variants array within item_attribute
                const item_attribute = data.item_attribute || {};  // Access item_attribute
                const variants = item_attribute.variants || [];    // Access variants array inside item_attribute
                if (variants.length > 0) {
                    for (const variant of variants) {
                        const variantImageUrl = variant.variant_image;
                        if (variantImageUrl) {
                            await deleteImageFromBucket(variantImageUrl);
                        }
                    }
                }

                // Optionally delete the Firestore document after image deletion
                await docRef.delete();
                console.log("Document and images deleted successfully.");
            } catch (error) {
                console.error("Error deleting document and images:", error);
            }
        };

    const deleteImageFromBucket = async (imageUrl) => {
        try {
            const storageRef = firebase.storage().ref();

            // Check if the imageUrl is a full URL or just a child path
            let oldImageUrlRef;
            if (imageUrl.includes('https://')) {
                // Full URL
                oldImageUrlRef = storageRef.storage.refFromURL(imageUrl);
            } else {
                // Child path, use ref instead of refFromURL
                oldImageUrlRef = storageRef.storage.ref(imageUrl);
            }
            var envBucket = "<?php echo env('FIREBASE_STORAGE_BUCKET'); ?>";
            var imageBucket = oldImageUrlRef.bucket;
            // Check if the bucket name matches
            if (imageBucket === envBucket) {
                // Delete the image
                await oldImageUrlRef.delete();
                console.log("Image deleted successfully.");
            }
        } catch (error) {

        }
    };

</script>

@yield('scripts')

</body>
</html>
