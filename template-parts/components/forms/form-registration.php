<div class="container flex">
    <form class="mt-12 flex gap-4 flex-col sm:flex-row">
        <div class="grow">

            <!-- Associate labels with inputs its a UI Best Practice -->
            <label for="username">Username</label>
            <input type="text" id="username" name="login" />

            <label for="email" class="sr-only">Email address</label>
            <input type="email" id="email" name="email" placeholder="Email address" class="w-full rounded-lg border-slate-300 text-sm leading-6 placeholder-slate-400 shadow-sm
            focus:outline-black focus:outline-2 focus:outline-dotted focus:outline-offset-2 focus:border-slate-300 focus:ring-0" />

            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="John Smith" />

            <input type="radio" id="user_group_blogger" name="user_group" value="blogger" />
            <label for="user_group_blogger">Blogger</label>

            <input type="radio" id="user_group_designer" name="user_group" value="designer" />
            <label for="user_group_designer">Designer</label>

            <input type="radio" id="user_group_developer" name="user_group" value="developer" />
            <label for="user_group_developer">Developer</label>
        </div>
    </form>
</div>