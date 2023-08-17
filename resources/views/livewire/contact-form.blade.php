<div class="lg:w-1/2 md:w-1/2 flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0 bg-white">

    <form wire:submit.prevent="submitForm" wire:loading.class="opacity-50">

        <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Contactez nous</h2>
        <p class="leading-relaxed mb-5 text-gray-600">
        </p>
        @if($success)
        <div class="text-xl font-bold ">Merci pour votre Message !</div>
        @endif
        <div class="relative mb-4">
            <label for="name" class="leading-7 text-sm text-gray-600">Nom Complet</label>
            <input type="text" id="name" name="name" wire:model="name"
                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>

        <div class="relative mb-4">
            <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
            <input type="email" id="email" name="email" wire:model="email"
                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>

        <div class="relative mb-4">
            <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
            <textarea id="message" name="message" wire:model="message"
                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
        </div>

        <button class="text-white bg-black border-0 py-2 px-6 focus:outline-none hover:bg-black/80 rounded text-lg">
            Envoyer
        </button>

        <p class="text-xs text-gray-500 mt-3"></p>

    </form>


</div>
