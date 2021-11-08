<div class="movie-item-page">
	<div class="movie-item-page--header">

		<div class="movie--page-header--title">
			<?= $movie['title'] ?>
			<div class="movie--page-header--subtitle">
				<?= $movie['original-title'] ?>
				<div class="movie-header--age-rating">
					<div class="agerate-rectangle">
						<div class="movies-ageRate">
							<?= $movie['age-restriction'] . "+" ?>
						</div>
					</div>
				</div>

			</div>

		</div>
		<div style="flex:1"></div>
		<div class="movie-like-button"></div>


	</div>
	<div class="movie-page--container">
		<div class="movie-page--image--container">
			<div class="movie-page--image" style="background-image: url(./resource/image/<?= $movie['id'] ?>.jpg)">

			</div>

		</div>
		<div class="movie-page--info">
			<div class="movie-page--rating">
				<?php
				$rate = floor($movie['rating']) ?>
				<?
				for ($i = 0; $i < $rate; $i++): ?>
					<div class="rate-rectangle--orange">
					</div>
				<?php
				endfor; ?>
				<?
				for ($i = 0; $i < 10 - $rate; $i++): ?>
					<div class="rate-rectangle-grey"></div>
				<?php
				endfor; ?>
				<div class="rate-page--num">
					<div class="page-rating">
						<?= $movie['rating']; ?>
						<?= $rating ?>
					</div>
				</div>

			</div>
			<div class="movie-page--inform">
				<div class="page--about-movie">О фильме</div>
				<div class="movie-info--release-date">
					<div class="release-date"> Год производства:</div>
					<div class="date"><?= $movie['release-date'] ?></div>
				</div>
				<div class="movie-info-director">
					<div class="director-title">Режисер</div>
					<div class="director-name"><?= $movie['director'] ?></div>
				</div>
				<div class="page--actor-inform">
					<div class="actor-list--title">В главных ролях:</div>
					<div class="actor-list"><?= getMovieActors($movie) ?></div>
				</div>
			</div>
			<div class="page--description">Описание</div>
			<div class="page--movie-description">
<?=$movie['description']?>
			</div>
		</div>

	</div>
