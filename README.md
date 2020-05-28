# codeigniter-forum-beadando
<h3>Határidő után implementálva :</h3>

<ul>
	<li>05.28.
		<ul>
			<li>Posts - index (Latest Posts) - Pagination </li>
			<li>Posts - posts/topic/$index - Pagination </li>
			<li>Admin - minden csak admin engedéllyel
				<ul>
					<li>adatok megjelenítése</li>
				</ul>
			</li>
		</ul>
	</li>
	<li>05.27.
		<ul>
			<li>Category
				<ul>
					<li>create: csak admin</li>
					<li>create subcategory : csak belépve</li>
					<li>delete: csak admin</li>
					<li>edit: csak admin</li>
					<li>update: csak admin</li>
				</ul>
			</li>
			<li>Subcategory
				<ul>
					<li>delete: csak user vagy admin</li>
					<li>create: csak bejelentkezve</li>
					<li>edit: csak user vagy admin</li>
				</ul>
			</li>
			<li>Posts
				<ul>
					<li>create: csak belépve</li>
					<li>edit: csak tulaj vagy admin VIEW NEM JÓ</li>
					<li>update: csak tulaj vagy admin</li>
					<li>delete : csak tulaj vagy admin</li>
				</ul>
			</li>
			<li>codeigniter-forum-beadando/categories: csak akkor jelenik meg a Create Category link, ha adminként vagyunk bejelentkezve </li>
			<li>codeigniter-forum-beadando/categories/$id: csak akkor jelenik meg az edit és a delete, ha adminként vagyunk bejelentkezve  </li>
		</ul>
	</li>
</ul>

<h3>Határidőig implementálva:</h3>
<ul>
	<li>Input mezők validálása</li>
	<li>Felhasználók
		<ul>
			<li>saját validációs szabály regisztrációnál</li>
			<li>bejelentkezés</li>
			<li>regisztráció</li>
			<li>kiejelentkezés</li>
		</ul>
	</li>
	<li>Kategóriákat
		<ul>
			<li>létrehozásnál fényképet lehet feltölteni, amit validálunk</li>
			<li>létrehozni</li>
			<li>megjeleníteni</li>
			<li>módosítani</li>
			<li>törölni</li>
		</ul>
	</li>
	<li>
		Alkategóriákat (Topicocat/subcategories)
		<ul>
			<li>létrehozni</li>
			<li>megjeleníteni</li>
			<li>módosítani</li>
			<li>törölni</li>
		</ul>
	</li>
	<li>
		Posztokat
		<ul>
			<li>létrehozni - csak akkor ha be van jelentkezve</li>
			<li>megjeleníteni</li>
			<li>törölni</li>
		</ul>
	</li>
	
</ul>

<h3>Követelmények</h3>
<ol>
	<li>Működő weboldal MVC keretrendszerben.</li>
	<li>A kapcsolódó adatmodell legalább 6 táblát tartalmaz.
</li>
	<li>Adminisztrációs felület + publikus felület.</li>
	<li>Felhasználók kezelése: A weboldal szolgáltatásai (vagy annak bizonyos rétege) csak előzetes bejelentkeztetés után, a megfelelő jogosultság birtoklásával érhető el. A beadandó feladatban legalább két jogosultsági szint megkülönböztetése:</li>
	<ul>
		<li>Szuperadmin: minden adathoz és funkcióhoz korlátlanul hozzáfér, felhasználók kezelése</li>
		<li>Korlátozott felhasználói jogosultság: az adatok bizonyos köréhez és/vagy bizonyos szolgáltatásokhoz fér hozzá</li>
	</ul>
	<li>Kimenetek generálása: a web alkalmazás valamely funkcióiban kimeneti fájlokat generál (.csv, .pdf, stb.)</li>
	<li>Importálási lehetőség támogatása: az adatok kezelése során bizonyos adatcsoportok importálása biztosított megfelelő felépítésű fájlból.</li>
	<li>Reszponzív design: a webalkalmazás egyaránt működik asztali gépen/táblagépen/mobil készüléken.</li>
	<li>CSS alkalmazása
</li>
	<li>Fájlkezelés: az oldalon keresztül kell fájlokat fel/le tölteni.
</li>
</ol>
