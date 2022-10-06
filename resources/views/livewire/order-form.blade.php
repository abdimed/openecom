<div>

    <h2 class="lg:col-span-2 text-3xl font-bold my-10">Information Client</h2>

    <div class="relative">

        <form wire:submit.prevent="newOrder">

            <div
                class="grid grid-cols-1 lg:grid-cols-2 gap-y-5 lg:p-5 p-2 bg-gray-100 rounded-md divide-x-2 divide-gray-300">

                <div class="lg:p-5 p-2 flex flex-col gap-y-5">

                    <div class="flex flex-col">
                        <label for="full_name">nom complet</label>
                        <input type="text" wire:model.defer="full_name" class="rounded-full">
                    </div>
                    <div class="flex flex-col">
                        <label for="tel"> N° Téléphone </label>
                        <input type="tel" wire:model.defer="tel" class="rounded-full">
                    </div>
                    <div class="flex flex-col">
                        <label for="wilaya">Wilaya</label>
                        <input type="text" wire:model.defer="wilaya" class="rounded-full">
                    </div>

                    <div class="flex flex-col">
                        <label for="address">Adresse de livraison</label>
                        <input type="text" wire:model.defer="address" class="rounded-full">
                    </div>

                    <div class="">
                        <label for="is_compnay"> Vous etes une entreprise ?</label>
                        <input type="checkbox" wire:model.defer="is_company" value="1" class="peer">

                        <div class="hidden peer-checked:flex flex-col gap-y-5 mt-5">
                            <div class="flex flex-col">
                                <label for="company_name">Nom de l'entreprise</label>
                                <input type="text" name="company_name" class="rounded-full ">
                            </div>

                            <div class="flex flex-col">
                                <label for="email">Email Professionel</label>
                                <input type="email"  wire:model.defer="email"  class="rounded-full ">
                            </div>
                        </div>

                    </div>

                </div>

                <div class="lg:p-5 p-2">
                    <div class="grid grid-cols-1 gap-y-10">

                        <h2 class="text-3xl font-bold">Livraison</h2>
                        <div class="flex items-center space-x-3">
                            <input type="radio" name="delivery" id="home_delivery" class="accent-pink-500">
                            <label for="home_delivery" class="text-2xl font-semibold">Livraison à domicile</label>
                        </div>
                        <div class="flex items-center space-x-3">
                            <input type="radio" name="delivery" id="shop_delivery">
                            <label for="shop_delivery" class="text-2xl font-semibold">Récuperer la commande d’un de
                                nos Magasins</label>
                        </div>

                        <div
                            class="grid grid-cols-1 border border-dashed border-gray-400 bg-gray-200 divide-y-4 divide-gray-400/25 p-2 rounded-md text-gray-700">
                            <div class="p-2">
                                total des articles: <span class="font-semibold">{{ $totalPrice }} DA</span>
                                <br>
                                +
                                <br>
                                Livraison: <span class="font-semibold">700DA</span>
                            </div>

                            <div class="p-2">
                                <span class="text-xl font-semibold">Total à payer:</span>
                                <br>
                                <span class="flex justify-center font-bold text-3xl"> 8000 DA</span>
                            </div>
                        </div>

                        <button type="submit"
                            class="bg-red-500 rounded-md p-2 text-white text-bold text-2xl w-fit place-self-center">
                            Proceder a l'achat
                        </button>

                    </div>

                </div>

            </div>

        </form>

       <x-loading/>

    </div>

</div>
