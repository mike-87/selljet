<div class="modal fade" id="postAdModal" tabindex="-1" role="dialog" aria-labelledby="postAdModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="postAdModalLabel">Dodaj oglas</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ url('/adPost') }}" id="postAdForm" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-4">
                            <label for="title">Naslov:</label>
                            <input type="text" name="title" id="title">
                        </div>
                        <span class="text-danger title-remove">Morate uneti ime</span>
                    </div>
                    <div class="row">
                        <div class="col-10 mt-3">
                            <label for="describeAd">Opis:</label>
                            <textarea class="form-control" name="describeAd" id="describeAd" rows="3" cols="10"></textarea>
                        </div>
                        <span class="text-danger describe-remove">Morate uneti opis</span>
                    </div>
                    <div class="row">
                        <div class="col-4 mt-3">
                            <label for="price">Cena:</label>
                            <input type="number" min="0.00" max="99999999.99" step="0.01" name="price" id="price">
                        </div>
                        <span class="text-danger price-remove">Morate uneti cenu</span>
                    </div>
                    <div class="row">
                        <div class="col-4 mt-3">
                            <label for="condition">Stanje:</label>
                            <select name="condition" id="condition">
                                <option value="0">Odaberite stanje</option>
                                <option value="1">Novo</option>
                                <option value="2">Polovno</option>
                            </select>
                        </div>
                        <span class="text-danger condition-remove">Morate odabrati stanje</span>
                    </div>
                    <div class="row">
                        <div class="col-9 mt-3">
                            <label for="image">Odaberite sliku:</label>
                            <input type="file" class="form-control" id="image" name="image" >
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-6 mt-3">
                            <label for="section">Sekcija:</label>
                            <select name="section" id="section">
                                <option value="0">Odaberite sekciju</option>
                                @foreach($sections as $section)
                                <option value="{{$section->categories_id}}">{{$section->name}}</option>
                                @endforeach
                            </select>
                        </div> 
                        <span class="text-danger section-remove">Morate odabrati sekciju</span> 
                    </div>
                    <div class="row sectionCategory">
                        <div class="col-6 mt-3">
                            <label for="category">Kategorija:</label>
                            <select name="category" id="category">
                                <option value="0">Odaberite kategoriju</option>
                                
                            </select>
                        </div> 
                        <span class="text-danger category-remove">Morate odabrati kategoriju</span> 
                    </div>
                    <div class="row sectionSubcategory">
                        <div class="col-6 mt-3">
                            <label for="subcategory">Podkategorija:</label>
                            <select name="subcategory" id="subcategory">
                                <option value="0">Odaberite podkategoriju</option>
                                
                            </select>
                        </div> 
                        <span class="text-danger subcategory-remove">Morate odabrati podkategoriju</span> 
                    </div>
                    <div class="row">
                        <div class="col-6 mt-3">
                            <label for="phone">Telefon:</label>
                            <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3,4}-[0-9]{3}">
                        </div>
                        <span class="text-danger phone-remove">Morate uneti broj telefona</span>
                    </div>
                    <div class="row">
                        <div class="col-4 mt-3">
                            <label for="location">Lokacija:</label>
                            <select name="location" id="location">
                                <option value="">Odaberite lokaciju</option>
                                <option value="Beograd">Beograd</option>
                                <option value="Kragujevac">Kragujevac</option>
                                <option value="Leskovac">Leskovac</option>
                                <option value="Niš">Niš</option>
                                <option value="Novi Sad">Novi Sad</option>
                            </select>
                        </div>
                        <span class="text-danger location-remove">Morate odabrati lokaciju</span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary closeAd" data-dismiss="modal">Otkaži</button>
                <button type="submit" class="btn btn-primary submitAd">Postavi oglas</button>
            </div>
        </div>
    </div>
</div>