<?php 

namespace DareToConquer\Services;

use League\CommonMark\CommonMarkConverter;

class Markdowner
{
	/**
	 * Convert Markdown to HTML
	 * @param  string $text Markdown text
	 * @return string       Converted HTML
	 */
	public function toHTML($text)
	{
		$converter = new CommonMarkConverter();

		$text = $converter->convertToHtml($text);

		return $text;
	}
}