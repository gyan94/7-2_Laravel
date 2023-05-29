<header>
    <table>
        <tbody>
            <tr>
                <td id="logo">
                    <a href="{{ route('home') }}">グルメモリー</a>
                </td>
                <td id="space1"></td>
                <td class="menu">
                    <a href="{{ route('show_contact') }}">投稿する</a>
                </td>
                <td class="menu">
                    <a href="{{ route('history') }}">投稿履歴</a>
                </td>
                <td class="menu">
                    <a href="{{ route('like') }}">いいね一覧</a>
                </td>
                <form action="{{ route('logout') }}" name="logout" method="POST">
                    @csrf
                <td class="menu">
                    <a onclick="document.logout.submit();">ログアウト</a>
                </td>
                </form>
            </tr>
        </tbody>
    </table>
</header>