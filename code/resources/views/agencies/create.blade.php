
<!-- Définir la structure de la page à l'aide d'un composant Laravel -->
<x-app-layout>

    <!-- Définir le contenu de l'en-tête de la page -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer une agence') }}
        </h2>
    </x-slot>

    <!-- Créer une section pour le contenu principal de la page -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- Créer un formulaire pour ajouter une nouvelle agence à la base de données -->
                    <form action="{{ route('agencies.store') }}" method="post">
                        @csrf
                        <!-- Protection CSRF pour empêcher les attaques de type cross-site request forgery -->
                        <div class="overflow-x-auto">
                            <table class="table-auto w-full">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <!-- Ajouter une colonne pour le nom de l'agence -->
                                        <th class="px-4 py-2 text-center">Nom de l'agence</th>
                                        <!-- Ajouter une colonne pour le chef d'agence -->
                                        <th class="px-4 py-2 text-center">Chef d'agence</th>
                                        <!-- Ajouter une colonne pour les actions -->
                                        <th class="px-4 py-2 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <!-- Ajouter une cellule pour le champ de saisie du nom de l'agence -->
                                        <td class="border px-4 py-2 text-center">
                                            @if ($errors->has('label'))
                                            <div class="text-red-500 font-semibold my-2">
                                            {{ $errors->first('label') }}
                                            </div>
                                            @endif
                                            <input type="text" name="label" placeholder="Nom de l'agence" class="w-full"></td>
                                        <!-- Ajouter une cellule pour la liste déroulante de sélection du chef d'agence -->
                                        <td class="border px-4 py-2 text-center">
                                            <select name="user_id" id="">
                                                <!-- Itérer sur la liste des utilisateurs pour créer des options pour chaque utilisateur -->
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <!-- Ajouter une cellule pour le bouton de soumission du formulaire -->
                                        <td class="border px-4 py-2 text-center">
                                            <button type="submit"
                                                class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Ajouter</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>