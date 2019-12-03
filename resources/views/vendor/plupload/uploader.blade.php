@if (!empty($options['url']))
    <div id="uploader"
        data-options="{{ json_encode($options) }}"
        data-autostart="{{ intval($autoStart) }}"
        data-uploadbtn="uploader-upload">
        <div id="{{ $options['container'] }}" class="controls uploader">
            <div class="filelist"></div>
            <div class="upload-actions">
                <a class="btn btn-primary btn-browse" id="uploader-pickfiles" href="javascript:;">
                    <i class="fa fa-file"></i> {{ trans('plupload::ui.browse')  }}
                </a>
                @if (! $autoStart)
                    <a class="btn btn-info btn-upload" id="uploader-upload" href="javascript:;">
                        <i class="fa fa-upload"></i> {{ trans('plupload::ui.upload')  }}
                    </a>
                @endif
            </div>
            <div class="uploaded row" style="margin-top: 10px"></div>
        </div>
    </div>
@else
    Missing URL option.
@endif
