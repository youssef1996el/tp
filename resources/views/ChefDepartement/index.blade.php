@extends('ChefDepartement.navbar')
@section('navbarchef')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="container">
    <!-- Les annonces -->
    <h3 class="text-uppercase bg-light p-3 border rounded-2"> Les annonces</h3>
    <div class="row">
        <div class="col-12 ">
            <button type="button" class="btn btn-primary float-end"  data-bs-toggle="modal" data-bs-target="#AddAnnounce">
                Ajouter une announce
        </div>
    </div>
    <div class="card text-left" style="height: 300px;
  overflow: auto;">
      <img class="card-img-top" src="holder.js/100px180/" alt="">
        <div class="card-body">

            <div class="announcements">
                <div class="announcement">
                <h2>Rencontre programmee par Madame Rita</h2>
                <p>
                <strong>Contenu :</strong>Vous auriez l'opportunité de discuter des derniers développements dans le domaine de l'informatique, d'échanger des idées avec des experts du secteur, et de participer à des sessions interactives.<br>
                C'est également l'occasion idéale pour élargir votre réseau professionnel en rencontrant des collègues passionnés et en établissant des liens significatifs dans l'industrie.<br>
                N'oubliez pas de prendre des notes, de poser des questions et de profiter pleinement de cette rencontre enrichissante.
                </p>
                <p>
                <strong>Filière :</strong> Informatique
                </p>
                <p>
                <strong>Module :</strong> Programmation avancée
                </p>
                <p>
                <strong>Auteur :</strong> Mohamed el sahraoui
                </p>
                    <div class="interaction-buttons">
                        <!-- <a href="#" class="like-button">J'aime</a>
                        <a href="#" class="comment-button">Commenter</a>
                        <a href="#" class="share-button">Partager</a> -->
                        <a href="#" class="delete-button">Supprimer</a>
                        <a href="#" class="edit-button">Modifier</a>
                    </div>
            <!--  <hr>
                <div class="comments" >
                    <div class="comment">
                    <span class="user">Nom Utilisateur:</span>
                    <span class="content">Ceci est un commentaire.</span>
                    </div>
                </div>

                <div class="comment-form">
                    <textarea placeholder="Ajoutez un commentaire"></textarea>
                    <button>Publier</button>
                </div> -->
                
            <!-- Répétez la structure pour d'autres annonces si nécessaire -->
                </div>
                <div class="announcement">
                <h2>Titre de l'Annonce</h2>
                <p>
                <strong>Contenu :</strong> Description détaillée de l'annonce. Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Proin sed justo vel lectus varius accumsan. Integer interdum ligula eget mi vestibulum, in scelerisque velit ultrices.
                </p>
                <p>
                <strong>Filière :</strong> Informatique
                </p>
                <p>
                <strong>Module :</strong> Programmation avancée
                </p>
                <p>
                <strong>Auteur :</strong> Nom de l'Auteur
                </p>    
                    <div class="interaction-buttons">
                        <!-- <a href="#" class="like-button">J'aime</a>
                        <a href="#" class="comment-button">Commenter</a>
                        <a href="#" class="share-button">Partager</a> -->
                        <a href="#" class="delete-button">Supprimer</a>
                        <a href="#" class="edit-button">Modifier</a>
                    </div>
            <!--  <hr>
                <div class="comments" >
                    <div class="comment">
                    <span class="user">Nom Utilisateur:</span>
                    <span class="content">Ceci est un commentaire.</span>
                    </div>
                </div>

                <div class="comment-form">
                    <textarea placeholder="Ajoutez un commentaire"></textarea>
                    <button>Publier</button>
                </div> -->
                
            <!-- Répétez la structure pour d'autres annonces si nécessaire -->
                </div>
            </div>
            </div>
            
        </div>

    <!-- Modal announce -->
    <div class="modal fade" id="AddAnnounce" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ajouter announce</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('StoreEmploi')}}" method="post">
                @csrf

                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="titre" class="mb-2" >Titre</label>
                                <input type="text" class="form-control" name="titre">
                            </div>
                            <div class="mb-3">
                                <label for="contenu" class="mb-2" >Contenu</label>
                                <textarea type="text" class="form-control" name="contenu"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="utilisateur_id" class="mb-2" >Auteur</label>
                                <select name="utilisateur_id" id="" class="form-select">
                                    <option value="">Selectionner un auteur</option>
                    
                                </select>
                            </div>
                            
 

                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="filiere_id" class="mb-2" >Filiere</label>
                                <select name="filiere_id" id="" class="form-select">
                                    <option value="">Selectionner une filiere</option>
                    
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="module_id" class="mb-2" >Module</label>
                                <select name="module_id" id="" class="form-select">
                                    <option value="">Selectionner un module</option>
                    
                                </select>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save </button>
                </div>
            </form>
          </div>
        </div>
      </div>
    

    <!-- Les emplois -->
    <h3 class="text-uppercase bg-light p-3 border rounded-2 mt-5">les emplois</h3>
    <div class="row">
        <div class="col-12 ">
            <button type="button" class="btn btn-primary float-end"  data-bs-toggle="modal" data-bs-target="#AddEmploi">
                Ajouter emploi
        </div>
    </div>
    <table class="schedule">
    <thead>
      <tr>
        <th>Jour</th>
        <th>Heure</th>
        <th>Cours</th>
        <th>Salle</th>
        <th>Groupe</th>
        <th>Action</th>

      </tr>
    </thead>
    <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{$item->day}}</td>
                <td>{{ Carbon\Carbon::parse($item->date_debut)->format('Y-m-d') }}-{{ Carbon\Carbon::parse($item->date_fin)->format('Y-m-d') }}</td>
                <td>{{$item->nom_activite}}</td>
                <td>{{$item->nameroom}}</td>
                <td>{{$item->namegroupe}}</td>

                <td>
                    <a href="{{ url('EditEmploi/' . $item->id) }}" class="fa-solid fa-pen-to-square btn btn-success"></a>
                    <a href="{{url('trashEmploi/' .$item->id)}}" class="fa-solid fa-trash btn btn-danger"></a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

<!-- Modal emploi -->
    
    <div class="modal fade" id="AddEmploi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('StoreEmploi')}}" method="post">
                @csrf

                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="day" class="mb-2" >Jour</label>
                                <select name="day" id="day" class="form-select">
                                @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                    <option value="{{ $day }}">{{ $day }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="day" class="mb-2" >Date de debut</label>
                                <input type="date" class="form-control" name="date_debut">
                            </div>
                            <div class="mb-3">
                                <label for="day" class="mb-2" >Group</label>
                                <select name="groupe_id" id="" class="form-select">
                                    <option value="">Selectionner un groupe</option>
                                    @foreach ($groups as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                                </select>
                            </div>
 

                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="day" class="mb-2" >Cours</label>
                                <select name="nom_activite" id="" class="form-select">
                                    <option value="">Selectionner un cours</option>
                    
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="day" class="mb-2" >Date de Fin</label>
                                <input type="date" class="form-control" name="date_fin">
                            </div>
                          
                            <div class="mb-3">
                                <label for="day" class="mb-2" >Salle</label>
                                <select name="room_id" id="" class="form-select">
                                    <option value="">Selectionner une salle</option>
                                    @foreach ($rooms as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                            </select>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save </button>
                </div>
            </form>
          </div>
        </div>
      </div>

    <!-- Les rencontres -->
    <h3 class="text-uppercase bg-light p-3 border rounded-2 mt-5">Les dates des rencontres</h3>
    <div class="row">
        <div class="col-12 ">
            <button type="button" class="btn btn-primary float-end"  data-bs-toggle="modal" data-bs-target="#AddRencontre">
                Ajouter une rencontre
        </div>
    </div>
    <table class="schedule">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Date</th>
                <th>Lieu</th>
                <th>Organisateur</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
                

        </tbody>
    </table>
      <div class="modal fade" id="AddRencontre" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ajouter une rencontre</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('StoreEmploi')}}" method="post">
                @csrf

                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="titre" class="mb-2" >Titre</label>
                                <input type="text" class="form-control" name="titre">
                            </div>
                            <div class="mb-3">
                                <label for="date" class="mb-2" >Date</label>
                                <input type="date" class="form-control" name="date">
                            </div>
                            
 

                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="utilisateur_id" class="mb-2" >Organisateur</label>
                                <select name="utilisateur_id" id="" class="form-select">
                                    <option value="">Selectionner un organisateur</option>
                    
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="lieu" class="mb-2" >Lieu</label>
                                <input type="date" class="form-control" name="lieu">

                            </div>
                            
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save </button>
                </div>
            </form>
          </div>
        </div>
      </div>
    <!-- Les dates de soutenances -->
    <h3 class="text-uppercase bg-light p-3 border rounded-2 mt-5">Les dates de soutenances PFE</h3>
    <div class="row">
        <div class="col-12 ">
            <button type="button" class="btn btn-primary float-end"  data-bs-toggle="modal" data-bs-target="#AddSoutenance">
                Ajouter date soutenance
        </div>
    </div>
    <table class="schedule">
        <thead>
            <tr>
                <th>Departement</th>
                <th>Filiere</th>
                <th>Groupe</th>
                <th>Titre</th>
                <th>Date</th>
                <th>Encadrant</th>
                <th>Etudiant</th>
                <th>Lieu</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
                

        </tbody>
    </table>
      <div class="modal fade" id="AddSoutenance" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ajouter date de soutenance PFE</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('StoreEmploi')}}" method="post">
                @csrf

                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="departement_id" class="mb-2" >Departement</label>
                                <select name="departement_id" id="" class="form-select">
                                    <option value="">Selectionner une departement</option>
                    
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="day" class="mb-2" >Group</label>
                                <select name="groupe_id" id="" class="form-select">
                                    <option value="">Selectionner un groupe</option>
                                    @foreach ($groups as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="day" class="mb-2" >Date de debut</label>
                                <input type="date" class="form-control" name="date_debut">
                            </div>
                            
                         
                            <div class="mb-3">
                                <label for="utilisateur_id" class="mb-2" >Encadrant</label>
                                <select name="utilisateur_id" id="" class="form-select">
                                    <option value="">Selectionner un enadrant</option>
                    
                                </select>
                            </div>
                          
                            <div class="mb-3">
                                <label for="lieu" class="mb-2" >Lieu</label>
                                <input type="text" class="form-control" name="lieu">

                            </div>
 

                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="filiere_id" class="mb-2" >Filiere</label>
                                <select name="filiere_id" id="" class="form-select">
                                    <option value="">Selectionner une filiere</option>
                    
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="titre" class="mb-2" >Titre</label>
                                <input type="text" class="form-control" name="titre">
                            </div>
                            <div class="mb-3">
                                <label for="day" class="mb-2" >Date de Fin</label>
                                <input type="date" class="form-control" name="date_fin">
                            </div>
                        
                            
                            <div class="mb-3">
                                <label for="utilisateur_id" class="mb-2" >Etudiant</label>
                                <select name="utilisateur_id" id="" class="form-select">
                                    <option value="">Selectionner un etudiant</option>
                    
                                </select>
                            </div>
                       
                            
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save </button>
                </div>
            </form>
          </div>
        </div>
      </div>

</div>
<style>
    table.schedule {
  width: 100%;
  border-collapse: collapse;
  margin: 20px 0;
}

table.schedule th, table.schedule td {
  border: 1px solid #ddd;
  padding: 10px;
  text-align: center;
}

table.schedule th {
  background-color: #f2f2f2;
}

table.schedule tbody tr:nth-child(even) {
  background-color: #f9f9f9;
}
.announcements {
      max-width: 800px;
      margin: 20px auto;
    }

    .announcement {
     /*  background-color: #fff;
      border: 1px solid #ddd;
      padding: 15px;
      margin-bottom: 20px; */
      max-width: 1000px;
    margin: 20px -100px;
    background-color: #e6e4e4;
    border: 1px solid #ddd;
    padding: 15px;
    width: 900px;
    }

    .interaction-buttons {
      margin-top: 10px;
    }

    .interaction-buttons a {
      margin-right: 10px;
      text-decoration: none;
      color: #385898;
    }

    .delete-button, .edit-button {
      color: #ff0000;
      cursor: pointer;
    }

    .comments {
      margin-top: 20px;
    }

    .comment {
      margin-bottom: 10px;
    }

    .comment .user {
      font-weight: bold;
      margin-right: 5px;
    }

    .comment .content {
      display: inline;
    }

    .comment-form {
      margin-top: 20px;
    }

    .comment-form textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      resize: vertical;
    }

    .comment-form button {
      padding: 10px;
      background-color: #385898;
      color: #fff;
      border: none;
      cursor: pointer;
    }
</style>
@endsection
