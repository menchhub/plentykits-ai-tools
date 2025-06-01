#!/usr/bin/env php
<?php

$target = getcwd() . '/.ai-context';

if (file_exists($target)) {
    echo "⚠️  .ai-context already exists in this directory.\n";
    exit(1);
}

mkdir($target, 0777, true);

$files = [
    'project-goals.md' => <<<EOT
# Project Goals

Develop a modular Elementor addon plugin called "PlentyKits"...
EOT,
    'stack-info.json' => <<<EOT
{ "type": "WordPress Elementor Plugin", "language": "PHP 8.0+" }
EOT,
    'mcp-agents.json' => <<<EOT
[
  { "name": "Widget Architect", "model": "gpt-4o", "task": "..." }
]
EOT,
    'memory.log' => "",
    'project-flows.md' => <<<EOT
## Widget Flow
Admin enables widget → Appears in Elementor → ...
EOT
];

foreach ($files as $filename => $content) {
    file_put_contents("$target/$filename", $content);
    echo "✅ Created $filename\n";
}

echo "\n🎉 .ai-context initialized in " . getcwd() . "\n";
