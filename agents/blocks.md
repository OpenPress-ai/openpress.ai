# OpenPress Block System Specification

OpenPress represents webpages as a series of Blocks, which are defined using JSON schemas. This document outlines the Block and Page schemas, along with examples of initial block types and the new theme system.

## Block Schema

Each Block in OpenPress is defined using the following JSON schema:

```json
{
  "type": "object",
  "properties": {
    "type": {
      "type": "string",
      "description": "The type of the block (e.g., 'Container', 'Headline', 'Button', etc.)"
    },
    "id": {
      "type": "string",
      "description": "Unique identifier for the block"
    },
    "attributes": {
      "type": "object",
      "description": "Block-specific attributes"
    },
    "children": {
      "type": "array",
      "items": {
        "$ref": "#"
      },
      "description": "Child blocks (for container-like blocks)"
    }
  },
  "required": ["type", "id"]
}
```

## Page Schema

A Page in OpenPress is composed of multiple Blocks and is defined using the following JSON schema:

```json
{
  "type": "object",
  "properties": {
    "title": {
      "type": "string",
      "description": "The title of the page"
    },
    "slug": {
      "type": "string",
      "description": "The URL slug for the page"
    },
    "theme": {
      "type": "object",
      "description": "Theme settings for the page",
      "properties": {
        "colors": {
          "type": "object",
          "properties": {
            "primary": { "type": "string" },
            "secondary": { "type": "string" },
            "background": { "type": "string" },
            "text": { "type": "string" }
          }
        },
        "typography": {
          "type": "object",
          "properties": {
            "fontFamily": { "type": "string" },
            "fontSize": {
              "type": "object",
              "properties": {
                "base": { "type": "string" },
                "h1": { "type": "string" },
                "h2": { "type": "string" }
              }
            }
          }
        },
        "spacing": {
          "type": "object",
          "properties": {
            "small": { "type": "string" },
            "medium": { "type": "string" },
            "large": { "type": "string" }
          }
        },
        "breakpoints": {
          "type": "object",
          "properties": {
            "sm": { "type": "string" },
            "md": { "type": "string" },
            "lg": { "type": "string" }
          }
        }
      }
    },
    "styles": {
      "type": "object",
      "description": "Global and component-specific styles",
      "properties": {
        "global": { "type": "object" },
        "container": { "type": "object" },
        "heading": { "type": "object" }
      }
    },
    "containerClasses": {
      "type": "string",
      "description": "Classes for the main container"
    },
    "blocks": {
      "type": "array",
      "items": {
        "$ref": "#/definitions/block"
      },
      "description": "An array of blocks that make up the page content"
    }
  },
  "required": ["title", "slug", "blocks"],
  "definitions": {
    "block": {
      // Block schema (as defined above)
    }
  }
}
```

## Theme System

The new theme system allows for specifying colors, typography, spacing, and breakpoints at the page level, which can then be used throughout the blocks. This is done using the `theme` property in the page schema. Theme values can be referenced in block attributes using the `{{theme.category.property}}` syntax.

## Initial Block Types

### 1. Container

```json
{
  "type": "Container",
  "id": "container-1",
  "attributes": {
    "className": "main-container",
    "style": {
      "backgroundColor": "{{theme.colors.background}}",
      "color": "{{theme.colors.text}}",
      "fontFamily": "{{theme.typography.fontFamily}}"
    }
  },
  "children": [
    // Child blocks go here
  ]
}
```

### 2. Headline

```json
{
  "type": "Headline",
  "id": "headline-1",
  "attributes": {
    "level": "h1",
    "content": "Welcome to OpenPress",
    "className": "text-4xl font-bold",
    "style": {
      "color": "{{theme.colors.primary}}",
      "fontSize": "{{theme.typography.fontSize.h1}}"
    }
  }
}
```

### 3. Button

```json
{
  "type": "Button",
  "id": "button-1",
  "attributes": {
    "text": "Click me",
    "url": "/action",
    "className": "px-4 py-2 rounded",
    "style": {
      "backgroundColor": "{{theme.colors.primary}}",
      "color": "{{theme.colors.background}}"
    }
  }
}
```

### 4. Image

```json
{
  "type": "Image",
  "id": "image-1",
  "attributes": {
    "src": "/images/example.jpg",
    "alt": "Example image",
    "width": 800,
    "height": 600,
    "className": "max-w-full h-auto"
  }
}
```

### 5. Paragraph

```json
{
  "type": "Paragraph",
  "id": "paragraph-1",
  "attributes": {
    "content": "This is a paragraph of text.",
    "className": "text-base mb-4",
    "style": {
      "fontFamily": "{{theme.typography.fontFamily}}",
      "fontSize": "{{theme.typography.fontSize.base}}"
    }
  }
}
```

## Example Page

Here's an example of how these blocks can be composed into a page with the new theme system:

```json
{
  "title": "Welcome to OpenPress",
  "slug": "welcome",
  "theme": {
    "colors": {
      "primary": "#007bff",
      "secondary": "#6c757d",
      "background": "#ffffff",
      "text": "#333333"
    },
    "typography": {
      "fontFamily": "'Arial', sans-serif",
      "fontSize": {
        "base": "16px",
        "h1": "2.5rem",
        "h2": "2rem"
      }
    },
    "spacing": {
      "small": "0.5rem",
      "medium": "1rem",
      "large": "2rem"
    },
    "breakpoints": {
      "sm": "640px",
      "md": "768px",
      "lg": "1024px"
    }
  },
  "styles": {
    "global": {
      "fontFamily": "{{theme.typography.fontFamily}}",
      "fontSize": "{{theme.typography.fontSize.base}}",
      "lineHeight": "1.5"
    },
    "container": {
      "padding": "{{theme.spacing.large}}"
    },
    "heading": {
      "fontWeight": "bold",
      "marginBottom": "{{theme.spacing.medium}}"
    }
  },
  "containerClasses": "min-h-screen bg-gray-100",
  "blocks": [
    {
      "type": "Container",
      "id": "main-container",
      "attributes": {
        "className": "max-w-4xl mx-auto py-8",
        "style": {
          "backgroundColor": "{{theme.colors.background}}",
          "color": "{{theme.colors.text}}"
        }
      },
      "children": [
        {
          "type": "Headline",
          "id": "main-headline",
          "attributes": {
            "level": "h1",
            "content": "Welcome to OpenPress",
            "className": "text-4xl mb-4",
            "style": {
              "color": "{{theme.colors.primary}}",
              "fontSize": "{{theme.typography.fontSize.h1}}"
            }
          }
        },
        {
          "type": "Paragraph",
          "id": "intro-paragraph",
          "attributes": {
            "content": "OpenPress is a flexible and powerful content management system.",
            "className": "mb-6"
          }
        },
        {
          "type": "Button",
          "id": "cta-button",
          "attributes": {
            "text": "Get Started",
            "url": "/get-started",
            "className": "px-4 py-2 rounded",
            "style": {
              "backgroundColor": "{{theme.colors.primary}}",
              "color": "{{theme.colors.background}}"
            }
          }
        }
      ]
    }
  ]
}
```

This specification allows for flexible and extensible page composition using various block types with consistent theming. The OpenPress core can use Laravel Blade templating to render these blocks, while other applications could implement their own rendering logic using React or other frontend frameworks.