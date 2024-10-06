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
      "description": "Theme colors for the page",
      "properties": {
        "primaryColor": {
          "type": "string",
          "description": "Primary color for the page"
        },
        "secondaryColor": {
          "type": "string",
          "description": "Secondary color for the page"
        },
        "backgroundColor": {
          "type": "string",
          "description": "Background color for the page"
        },
        "textColor": {
          "type": "string",
          "description": "Text color for the page"
        }
      }
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

The new theme system allows for specifying colors at the page level, which can then be used throughout the blocks. This is done using the `theme` property in the page schema. Colors can be referenced in block attributes using the `{{theme.colorName}}` syntax.

## Initial Block Types

### 1. Container

```json
{
  "type": "Container",
  "id": "container-1",
  "attributes": {
    "className": "main-container",
    "style": {
      "backgroundColor": "{{theme.backgroundColor}}",
      "color": "{{theme.textColor}}"
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
    "style": {
      "color": "{{theme.primaryColor}}"
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
    "style": {
      "backgroundColor": "{{theme.primaryColor}}",
      "color": "{{theme.backgroundColor}}"
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
    "height": 600
  }
}
```

### 5. Grid

```json
{
  "type": "Grid",
  "id": "grid-1",
  "attributes": {
    "columns": 3,
    "gap": "20px"
  },
  "children": [
    // Child blocks representing grid items go here
  ]
}
```

### 6. Query Loop

```json
{
  "type": "QueryLoop",
  "id": "query-loop-1",
  "attributes": {
    "postType": "post",
    "limit": 10,
    "orderBy": "date",
    "order": "DESC"
  },
  "children": [
    // Template blocks to be repeated for each query result
  ]
}
```

## Example Page

Here's an example of how these blocks can be composed into a page with the new theme system:

```json
{
  "title": "Welcome to OpenPress",
  "slug": "welcome",
  "theme": {
    "primaryColor": "#007bff",
    "secondaryColor": "#6c757d",
    "backgroundColor": "#ffffff",
    "textColor": "#333333"
  },
  "blocks": [
    {
      "type": "Container",
      "id": "main-container",
      "attributes": {
        "className": "page-container",
        "style": {
          "backgroundColor": "{{theme.backgroundColor}}",
          "color": "{{theme.textColor}}"
        }
      },
      "children": [
        {
          "type": "Headline",
          "id": "main-headline",
          "attributes": {
            "level": "h1",
            "content": "Welcome to OpenPress",
            "style": {
              "color": "{{theme.primaryColor}}"
            }
          }
        },
        {
          "type": "Image",
          "id": "hero-image",
          "attributes": {
            "src": "/images/hero.jpg",
            "alt": "OpenPress Hero Image",
            "width": 1200,
            "height": 600
          }
        },
        {
          "type": "Button",
          "id": "cta-button",
          "attributes": {
            "text": "Get Started",
            "url": "/get-started",
            "style": {
              "backgroundColor": "{{theme.primaryColor}}",
              "color": "{{theme.backgroundColor}}"
            }
          }
        }
      ]
    }
  ]
}
```

This specification allows for flexible and extensible page composition using various block types with consistent theming. The OpenPress core can use Laravel Blade templating to render these blocks, while other applications could implement their own rendering logic using React or other frontend frameworks.