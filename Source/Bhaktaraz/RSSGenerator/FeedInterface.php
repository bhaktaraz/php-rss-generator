<?php

namespace Bhaktaraz\RSSGenerator;

use \Bhaktaraz\RSSGenerator\ChannelInterface;

interface FeedInterface
{
	/**
	 * Add channel
	 * @param \Bhaktaraz\RSSGenerator\ChannelInterface $channel
	 * @return $thisJ
	 */
	public function addChannel(ChannelInterface $channel);

	/**
	 * Render XML
	 * @return string
	 */
	public function render();

	/**
	 * Render XML
	 * @return string
	 */
	public function __toString();
}
