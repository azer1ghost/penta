<ul class="{{ $is_Child ?? '' }}" >

    @php

        if (Voyager::translatable($items)) {
            $items = $items->load('translations');
        }

    @endphp

    @foreach ($items as $item)

        @php

            $originalItem = $item;
            if (Voyager::translatable($item)) {
                $item = $item->translate($options->locale);
            }

            $isActive = null;
            $styles = null;
            $icon = null;
            $isParent = null;

            // Background Color or Color
            if (isset($options->color) && $options->color == true) {
                $styles = 'color:'.$item->color;
            }
            if (isset($options->background) && $options->background == true) {
                $styles = 'background-color:'.$item->color;
            }

             if(!$originalItem->children->isEmpty()){
                $isParent = ' menu-item-has-children page_item_has_children';
             }

            // Check if link is current
            if(url($item->link()) == url()->current()){
                $isActive = 'current-menu-item';
            }

            // Set Icon
            if($item->icon_class){
                $icon = '<i class="' . $item->icon_class . '"></i>';
            }

        @endphp

        <li class="{{ $isActive.$isParent }}">
            <a href="{{ url($item->link()) }}" target="{{ $item->target }}" style="{{ $styles }}">
                {!! $icon !!}
                <span>{{ $item->title }}</span>
            </a>
            @if(!$originalItem->children->isEmpty())
                @include('frontend.moduls.header.menu', ['items' => $originalItem->children, 'is_Child' => 'sub-menu' ,'options' => $options])
            @endif
        </li>
    @endforeach

</ul>
