@php
    use App\Enums\AttendanceStatus;
@endphp

@if ($status == AttendanceStatus::PRESENT)
    <svg
        xmlns="http://www.w3.org/2000/svg"
        class="icon icon-tabler icon-tabler-square-check"
        width="24"
        height="24"
        viewBox="0 0 24 24"
        stroke-width="2"
        stroke="currentColor"
        fill="none"
        stroke-linecap="round"
        stroke-linejoin="round"
    >
        <path
            stroke="none"
            d="M0 0h24v24H0z"
            fill="none"
        />
        <path d="M3 3m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
        <path d="M9 12l2 2l4 -4" />
    </svg>
@endif

@if ($status == AttendanceStatus::ABSENT)
    <svg
        xmlns="http://www.w3.org/2000/svg"
        class="icon icon-tabler icon-tabler-square-x"
        width="24"
        height="24"
        viewBox="0 0 24 24"
        stroke-width="2"
        stroke="currentColor"
        fill="none"
        stroke-linecap="round"
        stroke-linejoin="round"
    >
        <path
            stroke="none"
            d="M0 0h24v24H0z"
            fill="none"
        />
        <path d="M3 5a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-14z" />
        <path d="M9 9l6 6m0 -6l-6 6" />
    </svg>
@endif

@if ($status == AttendanceStatus::LATE)
    <svg
        xmlns="http://www.w3.org/2000/svg"
        class="icon icon-tabler icon-tabler-time-duration-off"
        width="24"
        height="24"
        viewBox="0 0 24 24"
        stroke-width="2"
        stroke="currentColor"
        fill="none"
        stroke-linecap="round"
        stroke-linejoin="round"
    >
        <path
            stroke="none"
            d="M0 0h24v24H0z"
            fill="none"
        />
        <path d="M3 12v.01" />
        <path d="M7.5 19.8v.01" />
        <path d="M4.2 16.5v.01" />
        <path d="M4.2 7.5v.01" />
        <path d="M12 21a8.994 8.994 0 0 0 6.362 -2.634m1.685 -2.336a9 9 0 0 0 -8.047 -13.03" />
        <path d="M3 3l18 18" />
    </svg>
@endif

@if ($status == AttendanceStatus::EXCUSED)
    <svg
        xmlns="http://www.w3.org/2000/svg"
        width="24"
        height="24"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round"
        class="icon icon-tabler icons-tabler-outline icon-tabler-bookmarks"
    >
        <path
            stroke="none"
            d="M0 0h24v24H0z"
            fill="none"
        />
        <path d="M15 10v11l-5 -3l-5 3v-11a3 3 0 0 1 3 -3h4a3 3 0 0 1 3 3z" />
        <path d="M11 3h5a3 3 0 0 1 3 3v11" />
    </svg>
@endif

@if ($status == null)
    <svg
        xmlns="http://www.w3.org/2000/svg"
        width="24"
        height="24"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round"
        class="icon icon-tabler icons-tabler-outline icon-tabler-address-book-off"
    >
        <path
            stroke="none"
            d="M0 0h24v24H0z"
            fill="none"
        />
        <path d="M8 4h10a2 2 0 0 1 2 2v10m-.57 3.399c-.363 .37 -.87 .601 -1.43 .601h-10a2 2 0 0 1 -2 -2v-12" />
        <path d="M10 16h6" />
        <path d="M11 11a2 2 0 0 0 2 2m2 -2a2 2 0 0 0 -2 -2" />
        <path d="M4 8h3" />
        <path d="M4 12h3" />
        <path d="M4 16h3" />
        <path d="M3 3l18 18" />
    </svg>
@endif
