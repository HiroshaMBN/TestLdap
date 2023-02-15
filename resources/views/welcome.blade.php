



    {{-- <form method="POST" action="{{ route('ldap.settings.update') }}">
        @csrf
        <label for="server">hosts:</label>
        <input type="text" name="hosts" value="{{ config('ldap.hosts') }}"><br>

        <label for="username">username:</label>
        <input type="text" name="username" value="{{ config('ldap.username') }}"><br>

        <label for="password">password:</label>
        <input type="password" name="password" value="{{ config('ldap.password') }}"><br> --}}


        {{-- <label for="port">port:</label>
        <input type="number" name="port" value="{{ config('ldap.port') }}"><br> --}}


        {{-- <label for="server">base_dn:</label>
        <input type="text" name="base_dn" value="{{ config('ldap.base_dn') }}"><br> --}}





        {{-- <button type="submit">Save</button>
    </form> --}}

    <form action="{{ route('saveTxt') }}" method="post">
        <br><br>
        @csrf
    <label for="">Server URL: </label><input type="text" id="serverURL" name="serverURL"><br>


    <label for="">LDAP User Field </label><input type="text" id="userField" name="userField"><br>
    <label for="">User Base DN </label><input type="text" id="DN" name="DN"><br>
    {{-- ou=users,ou=bcts,dc=bluechip,dc=lk --}}
        {{-- <br><br>
        OU<input type="text" id=""><br>
        OU<input type="text" id="ou"><br>
        DC<input type="text" id="dc"><br>
        Dc<input type="text" id="dc"><br> --}}

<br><br>


    <label for="">Login ID </label><input type="text" id="LoginID" name="LoginID"><br>
    <label for="">Password </label><input type="text" id="password" name="password"><br>
    <button type="submit">Save</button>
    </form>














<button onclick="window.location.href='{{ route('ldap') }}'">Test LDAP</button>



{{--
@foreach ($config as $section => $settings)
    <h3>{{ $section }}</h3>
    <ul>
        @foreach ($settings as $key => $value)
            <li>{{ $key }}: {{ $value }}</li>
        @endforeach
    </ul>
@endforeach --}}
