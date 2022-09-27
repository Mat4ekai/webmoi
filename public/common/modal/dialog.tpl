<div
        class="modal"
        id="{{$id}}"
        {{$static ? 'data-bs-backdrop="static" data-bs-keyboard="false"' : ''}}
        tabindex="-1"
        aria-labelledby="{{$id}}Label"
        aria-hidden="true"
>
    <div class="modal-dialog {{$scrollable ? 'modal-dialog-scrollable' : ''}} {{$centered ? 'modal-dialog-centered' : ''}} "
         style="{{if $maxwidth}}max-width:{{$maxwidth}};{{/if}}{{if $minwidth}}min-width:{{$minwidth}};{{/if}}{{if $maxheight}}max-height:{{$maxheight}};{{/if}}{{if $minheight}}min-height:{{$minheight}};{{/if}}{{if $height}}height:{{$height}};{{/if}}"
    >
        <div class="modal-content {{if $h100}}h-100{{/if}}">
            {{if $title}}
            <div class="modal-header">
                <h5 class="modal-title" id="{{$id}}Label">{{$title}}</h5>
                {{if $closeBtn}}<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>{{/if}}
            </div>
            {{/if}}
            {{...}}
        </div>
    </div>
</div>