<?php

namespace AppShed\Remote\Style;

class CSSDocument
{
    protected $rules = [];
    protected $css = "";

    public function addRule($selector, $name, $value)
    {
        if ($value !== null && $value !== '') {
            if (is_array($selector)) {
                $selector = implode(' ', $selector);
            }
            if (!isset($this->rules[$selector])) {
                $this->rules[$selector] = [];
            }
            $this->rules[$selector][$name] = $value;
        }
    }

    public function addCSSText($css, $idSelector)
    {
        if (!empty($css)) {
            $idSelectorPattern = preg_quote($idSelector);
            $css = preg_replace_callback(
                "/(^|}|,[.:#@ \s]|(@media.+?{))\s*(({$idSelectorPattern}[.:#@ \s])?([^}@]*?))({|(?=,))/s",
                function ($matches) use ($idSelector) {
                    if ($matches[4]) {
                        return $matches[0] . "\n";
                    } else {
                        if (strpos($matches[5], '@') !== false) {
                            return "{$matches[1]} {$matches[5]} {$matches[6]}\n";
                        }
                        return "{$matches[1]}\n{$idSelector} {$matches[5]} {$matches[6]}\n";
                    }
                },
                $css
            );
            $this->css .= "/* Custom CSS */\n$css/* End Custom CSS */\n";
        }
    }

    public function getIdSelector($id)
    {
        return "#" . $id;
    }

    public function getClassSelector($class)
    {
        if (is_array($class)) {
            $class = implode('.', $class);
        }
        return "." . $class;
    }

    public function getPseudoClassSelector($class)
    {
        if (is_array($class)) {
            $class = implode(':', $class);
        }
        return ":" . $class;
    }

    public function getURLValue($url)
    {
        if ($url) {
            return "url($url)";
        }
        return null;
    }

    /**
     *
     * @param Color $c
     *
     * @return string
     */
    public function getColorValue(Color $c = null)
    {
        if ($c) {
            return $c->toString();
        }
        return null;
    }

    public function getFontValue($font)
    {
        if ($font) {
            return "'$font'";
        }
        return null;
    }

    public function getSizeValue($s, $unit = 'px')
    {
        if ($s) {
            return $s . $unit;
        }
        return null;
    }

    public function toString()
    {
        $str = $this->css;
        foreach ($this->rules as $selector => $rules) {
            $str .= "$selector {\n";
            foreach ($rules as $name => $value) {
                $str .= "\t$name: $value;\n";
            }
            $str .= "}\n";
        }
        return $str;
    }

    public function toSplashString()
    {
        $str = $this->css;
        foreach ($this->rules as $selector => $rules) {
            if (strpos($selector, "splash") !== false) {
                $str .= "$selector {\n";
                foreach ($rules as $name => $value) {
                    $str .= "\t$name: $value;\n";
                }
                $str .= "}\n";
            }
        }
        return $str;
    }
}
