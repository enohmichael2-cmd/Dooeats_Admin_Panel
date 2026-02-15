@extends('layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">{{ trans('lang.zoho_flow') }}</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">{{trans('lang.dashboard')}}</a></li>
                    <li class="breadcrumb-item active">{{ trans('lang.zoho_flow') }}</li>
                </ol>
            </div>
        </div>
        <div class="card-body">
            <div id="data-table_processing" class="dataTables_processing panel panel-default" style="display: none;">
                {{trans('lang.processing')}}
            </div>
            <div class="error_top"></div>
            <div class="row restaurant_payout_create">
                <div class="restaurant_payout_create-inner">
                    <fieldset>
                        <legend>{{trans('lang.zoho_flow')}}</legend>
                        <div class="form-group row width-100">
                            <label class="col-3 control-label">{{trans('lang.zoho_url')}}</label>
                            <div class="col-7">
                                <input type="text" class="form-control zoho_url">
                                <div class="form-text text-muted">
                                    {{ trans('lang.zoho_url_help') }}
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="form-group col-12 text-center btm-btn">
                <button type="button" class="btn btn-primary edit-form-btn"><i class="fa fa-save"></i> {{trans('lang.save')}}
                </button>
                <button type="button" class="btn btn-success send-test-btn"><i class="fa fa-paper-plane"></i> Send Test Webhook
                </button>
                <a href="{{url('/dashboard')}}" class="btn btn-default"><i class="fa fa-undo"></i>{{trans('lang.cancel')}}</a>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var database = firebase.firestore();
        var ref = database.collection('settings').doc('zohoFlow');

        $(document).ready(function () {
            /* jQuery("#data-table_processing").show(); */
            ref.get().then(async function (snapshots) {
                var zohoFlow = snapshots.data();
                if (zohoFlow == undefined) {
                    database.collection('settings').doc('zohoFlow').set({});
                }
                try {
                    if (zohoFlow.zoho_url) {
                        $(".zoho_url").val(zohoFlow.zoho_url);
                    }
                } catch (error) {
                }
                jQuery("#data-table_processing").hide();
            });

            $(".edit-form-btn").click(function () {
                var zoho_url = $(".zoho_url").val();
                if (zoho_url == '') {
                    $(".error_top").show();
                    $(".error_top").html("");
                    $(".error_top").append("<p>{{trans('lang.zoho_url_error')}}</p>");
                    window.scrollTo(0, 0);
                } else {
                    jQuery("#data-table_processing").show();
                    database.collection('settings').doc("zohoFlow").update({
                        'zoho_url': zoho_url
                    }).then(function (result) {
                        window.location.href = '{{ route("settings.app.zohoFlow") }}';
                    });
                }
            })

            $(".send-test-btn").click(function () {
                var zoho_url = $(".zoho_url").val();
                if (zoho_url == '') {
                    alert("{{trans('lang.zoho_url_error')}}");
                    return;
                }
                jQuery("#data-table_processing").show();
                $.ajax({
                    url: '{{ route("settings.app.zohoFlow.test") }}',
                    type: 'GET',
                    data: {
                        zoho_url: zoho_url
                    },
                    success: function (response) {
                        jQuery("#data-table_processing").hide();
                        if (response.success) {
                            alert(response.message);
                        } else {
                            alert('Error: ' + response.message);
                        }
                    },
                    error: function (xhr) {
                        jQuery("#data-table_processing").hide();
                        alert('Something went wrong. Please check console.');
                        console.log(xhr.responseText);
                    }
                });
            });
        })
    </script>
@endsection
