<ul>
    @foreach ($lists as $list)
         <li><a onclick="jobcard({{ $list->Job_card_No }})" href="javaScript::void(0)">{{ $list->Job_card_No }}</a></li>
    @endforeach
</ul>
